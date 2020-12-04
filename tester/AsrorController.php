<?php
/**
 *
 * Author:  Asror Zakirov
 * Created: 29.06.2017 19:06
 * https://www.linkedin.com/in/asror-zakirov-167961a9
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 */

namespace zetsoft\cncmd\tester;


use Carbon\Carbon;
use kartik\dynagrid\DynaGrid;
use kartik\editable\Editable;
use kartik\grid\DataColumn;
use kartik\helpers\Enum;
use Opis\Closure\SerializableClosure;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\FileHelper;
use yii\helpers\Html;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\former\test\TestLaptopForm;
use zetsoft\former\auth\AuthLoginForm;
use zetsoft\models\user\User;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZUrl;
use zetsoft\widgets\audios\ZPlayersVideoPlyrWidget;
use zetsoft\widgets\blocks\ZRefreshWidget;
use zetsoft\widgets\former\ZAjaxWidget;
use zetsoft\widgets\former\ZDynaWidget;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\menus\ZNavbar3Widget;
use zetsoft\widgets\navigat\ZButtonWidget;
use zetsoft\widgets\themes\ZFriendRequestsWidget;


class AsrorController extends ZControlCmd
{
    /**
     *
     * Function  actionRun
     * @throws \Exception
     */

    public function actionRun()
    {

        $this->renders('@zetsoft/webhtm/ALL/render/');
        print_r($this->options);
    }


    public $options = [];
    public $optionsALL = [];

    public $path;

    public function add(string $title)
    {
        if (!empty($this->options))
            $this->optionsALL[] = [
                'label' => $title,
                'items' => $this->options,
            ];

        $this->options = null;

        return true;
    }

    #region Render


    protected function renders($pathAlias)
    {
        $path = Az::getAlias($pathAlias);

        $this->options[] = [
            'label' => 'Компоненты',
            'items' => $this->allChilds($path)
        ];
    }


    protected function allChilds($path)
    {
        $folders = $this->folderChilds($path);
        $files = $this->fileChilds($path);
        return array_merge($folders, $files);
    }

    protected function folderChilds($path)
    {
        $folder = FileHelper::findDirectories($path, ['recursive' => false]);
        $folder = $this->folderArrayNormalize($folder);
        return $folder;
    }

    protected function fileChilds($path)
    {
        $files = FileHelper::findFiles($path, ['only' => ['*.php'], 'recursive' => FALSE]);
        $files = $this->fileArrayNormalize($files);
        return $files;
    }

    protected function fileArrayNormalize($arr)
    {
        $result = [];
        foreach ($arr as $item) {
            $pos = strrpos($item, '\\');
            $resultLabel = substr($item, $pos + 1);

            $item = FileHelper::normalizePath($item);
            $item = $this->_returnUrl($item);

            $result[] = [
                'label' => $resultLabel,
                'url' => [
                    '/core/tester/asror/main',
                    'path' => $item,
                ]
            ];
        }

        return $result;
    }

    protected function folderArrayNormalize($arr)
    {
        $result = [];
        foreach ($arr as $item) {
            $pos = strrpos($item, '\\');
            $resultLabel = substr($item, $pos + 1);

            $item = $this->allChilds($item);
            $result[] = [
                'label' => $resultLabel,
                'items' => $item
            ];

        }


        return $result;
    }

    protected function _returnUrl($path)
    {
        $pos = strpos($path, '\render');
        $item = substr($path, $pos + 1);

        $replace = ['.php', Root . '\webhtm\ALL', '/'];
        $item = str_replace($replace, '', $item);

        return $item;
    }


    public function country()
    {

        $model = $this->modelGet(\zetsoft\models\core\CoreInput::class, 7);

        echo Editable::widget([
            'model' => $model,
            'attribute' => 'zkselect2widget',
            'type' => 'primary',
            'size' => 'lg',
            'inputType' => Editable::INPUT_SELECT2,
            'options' => [
                'data' => [
                    'jghjhg',
                    'jghjhg',
                    'jghjhg',
                    'jghjhg', 0
                ]
            ]
        ]);
    }

    private function testRbac()
    {

        $user = User::findOne(10);
        //  print_r($user->attributes);
        //   print_r($user->getPlaceCountry()->attributes);

        $users = $user->getCoreRegions();

        foreach ($users as $aaa) {
            print_r($aaa->attributes);
        }

    }



    private function array()
    {


        $data = [];
        $i = 0;
        $j = 0;
        foreach ($data as $key => $item) {
            foreach ($item as $k => $it) {
                if ($i != 0) {
                    $dataId[$i][$data[0][$k]] = $it;
                    $j++;
                }
            }
            $i++;
        }

        $data = [
            ['id', 'number', 'schet'],
            [1, 3, 1000],
            [2, 24, 2000],
            [3, 65, 40000],
            [5, 48, 450000],
        ];

        print_r($data);

    }

    public function test()
    {
        $form = new TestLaptopForm();
        $a = $form->configs;
        vdd($a);
    }


    public function menu()
    {

        $users = User::find()
            ->asArray()
            ->indexBy('id')
            ->all();

        $user = ZArrayHelper::getValue($users, 1);


        $photo = implode("] ", $user['photo']);;
        echo $photo;
    }

    public function cotres()
    {
        $user = new User();
        $all = $user->allApp();
        print_r(array_keys($all->columns));


    }

    public function cores()
    {
        // item 1
        $model = new CoreDistrict();
        $model->id = 288;
        $model->name = 'Андижанская город';
        $model->place_region_id = 1;
        $model->created_at = '2019-12-21 12:23:53';
        $model->modified_at = '2019-12-21 12:23:53';
        $model->created_by = 0;
        $model->modified_by = 0;
        $model->save();

        $model = new CoreDistrict();
        $model->name = 'Андижанская город';
        $model->place_region_id = 1;
        $model->created_at = '2019-12-21 12:23:53';
        $model->modified_at = '2019-12-21 12:23:53';
        $model->created_by = 0;
        $model->modified_by = 0;
        $model->save();
        $model = new CoreDistrict();
        $model->name = 'Андижанская город';
        $model->place_region_id = 1;
        $model->created_at = '2019-12-21 12:23:53';
        $model->modified_at = '2019-12-21 12:23:53';
        $model->created_by = 0;
        $model->modified_by = 0;
        $model->save();
        $model = new CoreDistrict();
        $model->name = 'Андижанская город';
        $model->place_region_id = 1;
        $model->created_at = '2019-12-21 12:23:53';
        $model->modified_at = '2019-12-21 12:23:53';
        $model->created_by = 0;
        $model->modified_by = 0;
        $model->save();
    }

    public function sweet()
    {
        echo ZSweetAlert2WidgetOLD::widget([
            'config' => [
                'funcName' => 'funcName',
                'type' => ZSweetAlert2WidgetOLD::type['mixin'],
                'name' => 'asror',
                'title' => "Title",
                'titleText' => "Title text",
                'html' => 'asdadad'
            ]
        ]);
    }

    private function testAllApp()
    {
        $models = new TestLaptopForm();
        $app = $models->allApp();

        $model = Az::$app->forms->former->model($app);


        /**
         *
         * sEC
         */

        $app2 = new ALLApp();

        $config = new Config();
        $config->title = Az::l('Компьютеры');

        $app2->configs = $config;


        $app2->columns = [

            'name' => function (Form $column) {

                $column->title = Az::l('Название');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];

                return $column;
            },


            'title' => function (Form $column) {

                $column->title = Az::l('Тайтл');
                $column->widget = ZKSelect2Widget::class;
                $column->data = [
                    'default' => 'default',
                    'classic' => 'classic',
                    'bootstrap' => 'bootstrap',
                    'material' => 'material',
                    'krajee' => 'krajee',
                    'krajee-bs4' => 'krajee-bs4',
                ];
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];

                return $column;
            },
        ];

        $app2->cards = [];

        $model2 = Az::$app->forms->former->model($app2);

        echo '';
//        $this->testdata();
//        $this->testAjax2();
//        $this->testBtn();
//        $this->wd();
    }


    public function message()
    {

        echo ZMessageWidgetOLD1::widget([

        ]);

    }

    public function friend()
    {

        echo ZFriendRequestsWidget::widget([

        ]);

    }


    public function tt()
    {
        $core = new CoreColumn();

        Az::$app->forms->dynas->columns = [];
        Az::$app->forms->dynas->nameOn = [];
        Az::$app->forms->dynas->model = $core;

        Az::$app->forms->dynas->model();
        $columns = Az::$app->forms->dynas->columns;

        foreach ($columns as $column) {
            $att = ZArrayHelper::getValue($column, 'attribute');
            vd($att);
        }

    }

    public function wd()
    {
        $model = new CoreColumn();

        Az::$app->forms->wiData->model = $model;
        Az::$app->forms->wiData->columns = $model->columns;
        Az::$app->forms->wiData->attribute = 'core_widget_id';
        Az::$app->forms->wiData->data();

        $data = Az::$app->forms->wiData->data;

        $value = Az::$app->forms->wiData->value();

        $a = 1;
//        $model = new CoreColumn();
//        $model->search = true;
//
//        $params = [];
//        $provider = $model->search($params);
//
//        $widget = ZDynaWidget::widget([
//            'model' => $model,
//            
//        ]);
    }

    private function testBtn()
    {
        echo ZButtonWidget::widget([
            'config' => [
                'btnSize' => ZButtonWidget::btnSize['btn-lg'],
                'color' => ZButtonWidget::btnStyle['btn-info'],
                'badgeType' => ZButtonWidget::badgeType['badge-primary'],
                'badge' => '8',
            ]
        ]);

    }

    private function testAjax2()
    {

        echo ZAjaxWidget::widget([
            'config' => [
                'func' => 'Rado'
            ],
            'event' => [
                'success' => "function(data) {
               console.log(data);
          var myhtml = '';
          $.each(data, function(key, value) {
            myhtml +=
            '<div class=\"col-3 mb-3\"><div class=\"text-uppercase\"><p>' +
            key + ':'
            '<div class=\"col-3 mb-3\"><div class=\"ext-uppercase\"><p>' +
            value +
            '</div>';
            console.log(value);
          });
          $(\".myHtml\").html(myhtml);
          }",
            ]
        ]);
    }

    public function testdata()
    {
        $model = new CoreTest();

        $data = $model->columns['title']->data;

        $aaa = 1;
    }

    public function messages()
    {

        echo ZMessageWidgetOLD1::widget([

        ]);

    }

    public function modelConfig()
    {
        $model = PageAction::findOne(1);
        $crud = $model->configs->genCrud;
        $a = 1;

        if (!empty($this->moduleId))
            $this->data[] = [

            ];
    }

    public function cruds()
    {
        return Az::$app->smart->cruds->run();
    }

    public function pjax()
    {
        echo ZRefreshWidget::widget([
            'config' => [
                'type' => ZRefreshWidget::type['pjax'],
                'interval' => 1000,
                'stopBlock' => 'div.content-wrapper',
                'pjaxButton' => '#zGrid'
            ]
        ]);
    }

    public function validat()
    {
        $form = new AuthLoginForm();
        $form->name = 'user5';
        $form->password = 'aaaa';
        $b = $form->validate();
    }

    public function assignRole()
    {
        $user = User::findOne(7);
        $res = Az::$app->cores->auth->userAssign($user);
        $a = 1;
    }

    public function accessRules()
    {
        $rules = Az::$app->cores->rbac->rules();
        $ruless = [
            [
                'allow' => true,
                'actions' => [
                    'login',
                    'signup'
                ],
                'controllers' => [
                    'admin/',
                    'signup'
                ],
                'roles' => [
                    '?'
                ],
                'perms' => [
                    ''
                ],
            ],
            [
                'allow' => true,
                'actions' => [
                    'login',
                    'signup'
                ],
                'perms' => [
                    ''
                ],
            ],
            [
                'allow' => true,

                'controllers' => [
                    'admin/',
                    'signup'
                ],
                'roles' => [
                    '?'
                ],

            ],
            [
                'allow' => true,
                'actions' => ['logout'],
                'roles' => ['@'],
            ],
        ];

        $a = 1;

    }

    public function addRole()
    {
        $role = CoreRole::findOne(2);

        $result = Az::$app->cores->auth->roleAdd($role);

        $a = 1;

    }

    public function menus()
    {

        echo ZMMmenuWidgetOLD::widget([
            'config' => [
                'content.img.width' => 80,
                'fx-slides' => ZMMmenuWidgetOLD::fx_slide['fx-panels-slide-0'],

                'iconbar.top' => [
                    "<a href='#/'><i class='fa fa-home'></i>cc</a>",
                    "<a href='#/'><i class='fa fa-home'></i>cc</a>",
                ],
                'iconbar.bottom' => [
                    "<a href='#/'><i class='fa fa-home'></i>aa</a>",
                    "<a href='#/'><i class='fa fa-home'></i>cc</a>",
                ],

                'all.border' => ZMMmenuWidgetOLD::border['border-full'],
            ],
            'nameOn' => [
                1,
                2,
                7,
            ]
        ]);
    }

    public function actionNames()
    {
        $path = Root . '/actions/';
        $options = ['recursive' => true];

        $files = FileHelper::findFiles($path, $options);

        $actions = [];
        foreach ($files as $file) {
            $name = bname($file, '.php');
            $actions[] = $name;
        }

        $a = 1;

    }

    public function widata()
    {
        $model = new CoreFriend();

        Az::$app->forms->wiData->model = $model;
        Az::$app->forms->wiData->columns = $model->columns;
        Az::$app->forms->wiData->attribute = 'person_id';
        Az::$app->forms->wiData->data();

    }

    public function user()
    {
        $userClass = '\\zetsoft\\models\\' . App . '\\User';
        $user = new $userClass();
        $user->name = 'user5';
        $user->save();
        print_r($user->id);
    }

    public function sendmail()
    {
        $send = Yii::$app->mailer->compose()
            ->setFrom('zetsoftenterprise@yandex.com')
            ->setTo('tester@mail.ru')
            ->setSubject('Тема сообщения')
            ->setTextBody('Текст сообщения')
            ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
            ->send();

        var_dump($send);
    }

    public function actionFaq()
    {

        $faqData = new Faqs();
        $faqData->title = 'Вам нужны продукты питания?';
        $faqData->answer = 'Вход Забыли пароль?';
        //$faqData->question = 'Полезно Войти Забыли пароль?';
        /* $faqData->object = Faq::object['Perm'];*/
        $faqData->columns['object']->data;
        $faqData->save();
    }


    public function getFaq()
    {
        $comp = null;

        $query = Faqs::find()
            ->select([
                'title',
                'answer',
                'question'
            ])
            ->where([

            ]);

        $query->asArray();
        $comp = $query->all();

        print_r($comp);
        return $comp;
    }

    public function est()
    {
        $columnValue = 'ID Company';
        echo ZInflector::titleize($columnValue, true);

    }


    public function configs()
    {
        $models = new TestLaptopForm();
        $app = $models->allApp();

        $model = Az::$app->forms->former->model($app);


    }


    private function cards()
    {
        $a = [

            Az::l('OneStep') => [

                Az::l('OneBlock') => [
                    [
                        'name',
                    ],
                ],
                Az::l('TwoBlock') => [
                    [
                        'title',
                        'computer_id',
                    ],
                ],
            ],
            Az::l('TwoStep') => [

                Az::l('ThreeBlock') => [
                    [
                        'name',
                    ],
                ],
                Az::l('FourBlock') => [
                    [
                        'title',
                        'computer_id',
                    ],
                ],
            ],
        ];

        $str = ZVarDumper::value($a);
        print_r($str);
    }

    private function testTabs()
    {
        $closure = function (CoreTest $a) {
            return [
                $a::className(),
            ];
        };

//Class nameOn are resolved
        $cl = new SerializableClosure($closure);

        $closure = unserialize(serialize($cl))->getClosure();

        $c = new CoreTest();
        $aa = $closure($c);
        print_r($aa);
    }

    private function _testCC()
    {
        // Recursive factorial closure
        $factorial = function ($n) use (&$factorial) {
            return $n <= 1 ? 1 : $factorial($n - 1) * $n;
        };

// Wrap the closure
        $wrapper = new SerializableClosure($factorial);
// Now it can be serialized
        $serialized = serialize($wrapper);
    }


    public function dyna()
    {
        Az::$app->forms->dynas->columns = [];
        Az::$app->forms->dynas->nameOn = ['name', 'title', 'is_free'];
        Az::$app->forms->dynas->model = CoreCoreFormDb::findOne(48);

        Az::$app->forms->dynas->model();
        $columns = Az::$app->forms->dynas->columns;
        $a = 1;
    }

    public function player2()
    {
        echo ZPlayersVideoPlyrWidget::widget([
            'config' => [
                'type' => ZPlayersVideoPlyrWidget::type['youtube'],
            ],
        ]);

    }

    public function testStatic()
    {
        $model = new CoreTest();
        $model->name = 'aaf';
        print_r($model->attributes);

        $boot->env('mainDbIP');

    }

    public function rules()
    {
        $model = new CoreTest();
        $rules = $model->rules();
        //      print_r($rules);

    }

    public function card()
    {
        $model = new TestLaptopForm();

        //    print_r(LaptopForm::blocksByName(Az::l('OneBlock'), true));
        //   print_r(LaptopForm::blocksByStep(Az::l('OneStep'), true));
        print_r(TestLaptopForm::blocksByAll(false));

    }


    public function formGrid()
    {

        $model = new \zetsoft\models\libra\Computer();
        Az::$app->forms->former->model = $model;

        Az::$app->forms->former->isCnt = false;
        $rows = Az::$app->forms->former->run();
        print_r($rows);

    }


    private function slickTest()
    {
        echo ZCarouselSlickWidget::widget([

            'items' => [
                ZMdbCardWidget::widget([
                    'sImgUrl' => '/slick/pexels-photo-248797.jpg',
                    'title' => 'My Title',
                    'sText' => 'My personal text',
                    'sBtnStyle' => ZMdbCardWidget::Btn_Success
                ]),
                ZMdbCardWidget::widget([]),
                ZMdbCardWidget::widget([
                    'type' => ZMdbCardWidget::Type_Promoting,
                    'sImgUrl' => '/slick/pexels-photo-248797.jpg',
                ]),
                ZMdbCardWidget::widget([
                    'sImgUrl' => '/slick/pexels-photo-248797.jpg',
                    'title' => 'My Title',
                    'sText' => 'My personal text',
                    'sBtnStyle' => ZMdbCardWidget::Btn_Success
                ]),
                ZMdbCardWidget::widget([]),
                ZMdbCardWidget::widget([
                    'type' => ZMdbCardWidget::Type_Promoting,
                    'sImgUrl' => '/slick/pexels-photo-248797.jpg',
                ]),
            ]
        ]);
    }

    public function checkSecondDb()
    {
        $dbs = [];
        $components = Yii::$app->components;

        foreach ($components as $component) {
//            if (preg_match('/^db/', $component)) {
            if (strpos($component, 'db') === 0) {
                $dbs[] = $component;
            }
        }
    }

    public function checkMMenu()
    {
        $aTwo = Az::$app->cores->menus->create([
            /*    'admin',*/
            'ruslan',
        ]);

        $aOne = [
            [
                'title' => 'Разработка',
                'items' => [
                    [
                        'label' => 'Models',
                        'items' => [
                            [
                                'label' => 'Animal',
                                'url' => '#',
                                'blank' => true
                            ],
                            [
                                'label' => 'Book',
                                'url' => '#',
                                'blank' => true
                            ],
                        ]
                    ],
                ]
            ]
        ];

        $aALL = \zetsoft\system\helpers\ZArrayHelper::merge($aOne, $aTwo);

        echo ZMMenuNewWidget::widget([
            'optionsALL' => $aALL
        ]);
    }

    /**
     *
     * Function  getName
     * @throws \Exception
     *
     */
    private function getName()
    {

        echo Az::$app->cores->date->date();

        $aActivityForm = Animal::find()
            ->where([

            ])
            ->all();


        foreach ($aActivityForm as $activity) {
            echo "Name: {$activity->name}" . EOL;
            echo "Title: {$activity->title}" . EOL;
        }


    }

    private function _put()
    {

        for ($i = 1; $i <= 100; $i++) {
        }
    }

    private function _write()
    {
        $validate = Code::find()
            ->where(['serial_num' => 10000307])
            ->limit(1)
            ->exists();

        echo 'asfda';
        print_r($validate);
    }


    private function _alisher()
    {
        echo __FUNCTION__ . EOL;

        /** @var Company[] $aCompany */
        $aCompany = Company::find()
            ->where([
                'name' => 'testOrg1'
            ])
            ->all();


        foreach ($aCompany as $company) {
            echo " Name = {$company->name}" . EOL;
            echo " Email = {$company->email}" . EOL;
        }

        echo 'OK' . EOL;

    }


    public function actionFile()
    {

        $myfile = fopen('y:/Projects/zetsoft/excmd/file.txt', "w+");

        $txt = 'helloooo';

        fwrite($myfile, $txt);


    }


    private function _code()
    {
        Az::$app->App->vade->code->iID = 5;
        Az::$app->App->vade->code->first();
        Az::$app->App->vade->code->run();
    }


    private function _exec()
    {
        //   Az::$app->cores->exec->php('cruds/auto/run', true);
        Az::$app->cores->exec->php('codes/generate/go sardor', false, false);


        //  Az::$app->cores->exec->php('migrate --migrationPath=@zetsoft/migrate/ALL/');
        //. Az::$app->cores->exec->php('-v');
        //   echo  Az::$app->cores->exec->phpRun('getcwd();');
        // Az::$app->cores->exec->phpRun('echo "sardor";');
    }

    public function a($min, $max, $quantity)
    {

        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);


        /* try {
             $random = (random_int(1, $this->step) . '<br>');
         } catch (\Exception $e) {
         }
         for ($i = 0; $i < 5; $i++) {

             return $this->sum;
         }*/
    }

    private function _roleCheck()
    {

        $id = 3;
        $aRole = Az::$app->cores->auth->auth->getRolesByUser($id);
        print_r($aRole);


    }

    private function _widgetData()
    {

        $model = $this->modelGet(CoreRole::class);

        Az::$app->forms->wiData->clean();
        Az::$app->forms->wiData->model = $model;
        Az::$app->forms->wiData->attribute = 'perms';
        Az::$app->forms->wiData->data();

        $data = Az::$app->forms->wiData->data;

    }


    private function _dynagrid2()
    {
        Az::$app->forms->wiData->nameOn = [
            'name',
            [
                'title' => 'test title',
                'value' => function ($model) {
                    return 'test value';
                }
            ],
            [
                'attribute' => 'state',
                'value' => function ($model) {
                    return $model->state;
                },
                'widget' => ZHInputWidget::class,
                'options' => []
            ],

        ];
        Az::$app->forms->wiData->model = Menu::findOne(1);
        Az::$app->forms->wiData->dyna();
        $columns = Az::$app->forms->wiData->columns;
        $a = 1;
    }

    private function _dynagrid()
    {
        Az::$app->forms->wiData->nameOn = [
            'status',
            'pin_code' => [
                'attribute' => 'pin_code',
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'format' => 'raw',
                'value' =>
                    function ($mdl) {
                        $model = $mdl;

                        return Html::img(Yii::getAlias('@web/themes/loader/img/Word.gif'), [
                            'alt' => 'В процессе',
                            'title' => 'В процессе',
                            'width' => 50,
                            'data-toggle' => 'tooltip',
                        ]);

                        /*if (!$model->ReportWord) {
                            return Html::img(Yii::getAlias('@web/themes/loader/img/Word.gif'), [
                                'alt' => 'В процессе',
                                'title' => 'В процессе',
                                'width' => 50,
                                'data-toggle' => 'tooltip',
                            ]);

                        } else {

                            if (file_exists($model->ReportWord))
                                return Html::a('', ['report/download', 'Id' => $model->Id],
                                    [
                                        'type' => 'button',
                                        'id' => $model->Id,
                                        'title' => 'Сохранить отчет Word',
                                        'class' => 'fa fa-save fa-3x',
                                        'data-toggle' => 'tooltip',
                                        'data-pjax' => 0,
                                        'width' => 50
                                    ]);
                            else
                                return Html::img(Yii::getAlias('@web/themes/loader/img/Warning.png'), [
                                    'alt' => 'Файл отсутствует',
                                    'title' => 'Файл отсутствует',
                                    'width' => 40,
                                    'data-toggle' => 'tooltip',
                                ]);
                        }*/
                    },
                'order' => DynaGrid::ORDER_MIDDLE,
            ]
        ];
        //    Az::$app->forms->wiData->nameOn = null;
        Az::$app->forms->wiData->model = CodeBuild::class;
        Az::$app->forms->wiData->dyna();
        $columns = Az::$app->forms->wiData->columns;
    }


    private function _userAdd()
    {


        $coreRole = new CoreRole();
        $coreRole->name = 'Admin2';
        $coreRole->title = 'Administrator';
        $coreRole->perms = [
            CoreRolePerms::Create,
            CoreRolePerms::Delete,
            CoreRolePerms::Upload,
            CoreRolePerms::View,
        ];

        $coreRole->save();

        $user = new User();
        $user->name = 'asror3';
        $user->password = 'asror2';
        $user->role = $coreRole->id;
        $user->save();

    }


    private function _testPasswordSave()
    {
        $spass = 'true4';
        $hashOne = '$2y$13$Cw3DFH.6rGYnaZGdZibzU.htCPUO/bWJlhnSnd2ZxEiVEz40JZ90G';
        $hashTwo = Az::$app->security->generatePasswordHash($spass);

    }

    private function testSlug()
    {
        $a = 'Как ты работаеш?';

        echo Az::$app->forms->slugs->slugify($a);
    }

    public function actionTrans()
    {

    }


    public function actionGit()
    {
        echo 'Committed!';
    }

    private function domain()
    {
        foreach (range('a', 'z') as $sOne) {
            foreach (range('a', 'z') as $sTwo) {
                echo $sOne . $sTwo . '.uz' . PHP_EOL;
            }
        }
    }


    private function _dateTest()
    {
        echo Az::$app->cores->date->dateTime();
    }


    private function _formGridRaw()
    {

        $form = new AuthLoginForm();


    }

    private function _formGridTest()
    {

        $model = Number::findOne(1);

        /* echo ZFormWidget::widget([
             'model' => $model,
             'form' => null,
             'block' => 'One'
         ]);*/

        Az::beginProfile('adad');
        echo ZFormWidget::widget([
            'model' => $model,
            'form' => null,
        ]);

        Az::endProfile('adad');

    }


    private function _langTest()
    {
        $aMes = Az::$app->cores->langs->message;
        print_r($aMes);
    }

    private function _langTestTranslate()
    {
        $aMes = Az::l('sadf');
        print_r($aMes);
    }


    private function _dynaGridTest()
    {

        $model = Lang::findOne(6);
        $model->isSearch = true;

        $provider = $model->search([]);

        /** @var ActiveDataProvider $provider */
        echo ZDynaWidget::widget([
            // 'columns' => $columns,

            'model' => $model,
        ]);


    }

    private function _widgetTest2()
    {

        $aa = ZMessagesWidget::widget(['aMessage' => [
            [
                'sImg' => 'https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg',
                'title' => 'John Pierce',
                'sText' => 'I got your message bro',
                'type' => ZMessagesWidget::TYPE_WARNING,
                'carbonTime' => Carbon::now()->subMinutes(3),
            ],
            [
                'sImg' => 'image/avatar/all.png',
                'title' => 'Nora Silvester',
                'sText' => 'The subject goes here',
                'type' => ZMessagesWidget::TYPE_DANGER,
                'carbonTime' => Carbon::now()->subHours(4),
            ],
            [
                'sImg' => 'https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg',
                'title' => 'Brad Diesel',
                'sText' => 'Call me whenever you can...',
                'type' => ZMessagesWidget::TYPE_MUTED,
                'carbonTime' => Carbon::yesterday(),
            ]
        ]]);

        print_r($aa);
    }


    public function actionMenu()
    {

        $options = Az::$app->cores->menusWish->run();

        echo ZMMenuWidget::widget([
            'data' => $options
        ]);


        die;
    }


    public function actionTest()
    {
        echo ZMMenuWidget::widget();
    }

    private function player()
    {

        $ret = ZTab3Widget::widget([
            'icon' => 'th',
            'title' => 'adadadad',
            'data' => $this::$data,
        ]);


        echo $ret;

    }


    public function showMemory($comments = '')
    {

        Az::eol();
        Az::trace($comments);
        Az::eol();
        Az::trace(Enum::formatBytes(memory_get_usage()), 'memory_get_usage()');
        Az::trace(Enum::formatBytes(memory_get_usage(true)), 'memory_get_usage(true)');
        Az::trace(Enum::formatBytes(memory_get_peak_usage()), 'memory_get_peak_usage()');
        Az::trace(Enum::formatBytes(memory_get_peak_usage(true)), 'memory_get_peak_usage(true)');
    }

    public function rawStatEnum()
    {
        $data = Az::$app->cores->_Raw_StatEnum(Az::$app->cores->date->dateTime_Month_Start(), Az::$app->cores->date->dateTime('-5 days'), 224);

    }


    public function statCallhour()
    {
        $data = Az::$app->cores->statView->statCall_Hour(Az::$app->cores->date->dateTime_Month_Start(), Az::$app->cores->date->dateTime('-5 days'), 16);
    }

    public function statSubjecthour()
    {
        $data = Az::$app->cores->statView->stat_Subject_Hour(Az::$app->cores->date->dateTime_Month_Start(), Az::$app->cores->date->dateTime('-5 days'), 16);
    }

    public function CountDayStatSubject()
    {
        $data = Az::$app->cores->_Count_Day_StatSubject(Az::$app->cores->date->dateTime_Month_Start(), Az::$app->cores->date->dateTime('-5 days'), 16);
    }

    public function StatSubjectday()
    {
        $data = Az::$app->cores->statView->statSubject(Az::$app->cores->date->dateTime_Month_Start(), Az::$app->cores->date->dateTime('-5 days'), 16);
    }

    public function StatCallday()
    {
        $data = Az::$app->cores->statView->statCall_Day(Az::$app->cores->date->dateTime_Month_Start(), Az::$app->cores->date->dateTime('-5 days'), 16);
    }

    public function StatCallmonth()
    {
        $data = Az::$app->cores->statView->statCall_Month(Az::$app->cores->date->dateTime_Year_Start(), Az::$app->cores->date->dateTime_Month_End(), 16);
    }

    public function statSubjectMonth()
    {
        $data = Az::$app->cores->statView->stat_Subject_Month(Az::$app->cores->date->dateTime_Year_Start(), Az::$app->cores->date->dateTime_Month_End(), 16);
    }


    public function actionRbac()
    {
        Az::$app->utility->mains->rbac();
    }


    public function actionUser()
    {


        $auth = Az::$app->authManager;

        /**
         *
         *
         *
         * Adding User
         */


        /**
         *
         * Asror
         */

        $user = User::findOne(1);
        ($user) ? $user->delete() : null;

        $user = new User();

        $user->Username = 'Asror';
        $user->password = 'serverpass24';
        $user->role = Role::Role_Developer;

        $user->id = 1;
        $user->Email = 'zcore.zk@gmail.com';

        $user->save();

        Role::addRole($user);


        /**
         *
         * Anvar
         */

        $user = User::findOne(2);
        ($user) ? $user->delete() : null;


        $user = new User();

        $user->Username = 'Anvar';
        $user->password = 'serverpass24';
        $user->role = Role::Role_Developer;

        $user->id = 2;
        $user->save();


        Role::addRole($user);


        /**
         *
         * Operator
         */

        $user = User::findOne(3);
        ($user) ? $user->delete() : null;


        $user = new User();

        $user->Username = 'Operator1';
        $user->password = 'qlcpass24';
        $user->role = Role::Role_Operator;

        $user->id = 3;

        $user->save();
        Role::addRole($user);


        /**
         *
         * Supervisor
         */

        $user = User::findOne(4);
        ($user) ? $user->delete() : null;


        $user = new User();

        $user->Username = 'Supervisor1';
        $user->password = 'qlcpass24';
        $user->role = Role::Role_Supervisor;

        $user->id = 4;

        $user->save();
        Role::addRole($user);


        /**
         *
         * ClientLeader
         */

        $user = User::findOne(5);
        ($user) ? $user->delete() : null;


        $user = new User();

        $user->Username = 'ZCore';
        $user->password = '1024';
        $user->role = Role::Role_Client;

        $user->id = 5;

        $user->save();

        Role::addRole($user);


    }


    public function actionUserRole()
    {


        $auth = Az::$app->authManager;

        /**
         *
         *
         *
         * Adding User
         */


        /**
         *
         * Asror
         */

        $users = User::find()
            ->all();

        foreach ($users as $user) {
            Role::addRole($user);
        }
    }


}

