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


use Addvilz\Pharaoh\Builder;
use Fusonic\Linq\Linq;
use kartik\dynagrid\DynaGrid;
use kartik\dynagrid\models\DynaGridSettings;
use pdima88\uztranslit\UzCyrToLat;
use pdima88\uztranslit\UzLatToCyr;
use rmrevin\yii\fontawesome\FA;
use Symfony\Component\Finder\Finder;
use yii\helpers\StringHelper;
use zetsoft\apisys\crud\ZDepdropAction;
use zetsoft\dbdata\web\ActionWebData;
use zetsoft\dbitem\ALL\ZPropertyItem;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\former\lang\LanguageForm;
use zetsoft\former\test\TestLaptopForm;
use zetsoft\former\auth\AuthPhoneForm;
use zetsoft\former\eyuf\EyufCompletedForm;
use zetsoft\former\eyuf\HigherEducationForm;
use zetsoft\former\eyuf\EyufProgramForm;
use zetsoft\models\page\PageAction;
use zetsoft\models\page\PageBlocks;
use zetsoft\models\shop\ShopCategory;
use zetsoft\models\core\CoreCategoryOne;
use zetsoft\models\drag\DragConfigDb;
use zetsoft\models\page\PageControl;
use zetsoft\models\place\PlaceCountry;
use zetsoft\models\core\CoreInput;
use zetsoft\models\menu\Menu;
use zetsoft\models\auto\ChatMessage;
use zetsoft\models\shop\ShopOption;
use zetsoft\models\shop\ShopOptionType;
use zetsoft\models\shop\ShopProduct;
use zetsoft\models\core\CoreSetting;
use zetsoft\models\ALL\Test;
use zetsoft\models\ALL\Test3;
use zetsoft\models\user\User;
use zetsoft\models\App\eyuf\Card;
use zetsoft\models\App\eyuf\EyufCompatriot;
use zetsoft\models\App\eyuf\EyufDocument;
use zetsoft\models\App\eyuf\EyufDocumentType;
use zetsoft\models\App\eyuf\EyufScholar;
use zetsoft\models\App\eyuf\ScholarTest;
use zetsoft\models\shop\Product;
use zetsoft\service\acme\YaacAcmeTest;
use zetsoft\service\ALL\Utility;
use zetsoft\service\cores\Category;
use zetsoft\service\cores\Subscribe;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\actives\ZArrayQuery;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\helpers\ZVarDumper;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\blocks\ZFullCalendarWidget;
use zetsoft\widgets\former\ZArrayWidget;
use zetsoft\widgets\former\ZDetailWidget;
use zetsoft\widgets\former\ZDynaWidget;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\former\ZGrapesJsWidget;
use zetsoft\widgets\former\ZGrapesJsWidgetRavshan;
use zetsoft\widgets\former\ZListViewWidgetOld;
use zetsoft\widgets\former\ZMultiWidget;
use zetsoft\widgets\former\ZViewWidget;
use zetsoft\widgets\incores\ZMCheckboxGroupWidget;
use zetsoft\widgets\inputes\ZHTextareaWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\market\ZMenuWidget;
use zetsoft\widgets\menus\ZMmenuWidget;
use zetsoft\widgets\navigat\ZButtonWidget;
use zetsoft\widgets\navigat\ZGAccordionWidget;
use zetsoft\widgets\values\ZMultiViewWidget;

//require Root . '/ventest/phar/vendor/autoload.php';


class TestNestableController extends ZControlCmd
{

    public function actionRun()
    {
    vd(Az::$app->tests->nestable->getVal());
        //$this->coreOption();

    /*
        $aa = CoreCategory::findOne(215);

        $brands = [];
        foreach ($aa->getCoreBrandsFromCoreBrandIds() as $brand)
            $brands[] = $brand->name;


        vdd($brands);*/

//        $this->relate();


      /*  $sb = Az::$app->cores->subscribe->createSubScriber('a@gmail.com');    */


    }

    public function relate() {

        /** @var ZActiveRecord $model */
      /*  $model = new Test3();
        $model->configs->rules = [
            [
                validatorSafe
            ]
        ];
        $model->sender = 'Ravshanasd';
        $this->modelSave($model);   */


        //Az::$app->forms->modelz->relatedSave($model);
    }


    public function coreOption( ){
      /*  $model = CoreCategory::findOne(1);
        foreach ($model->shop_option_type as $data) {
            vd($data);
        }    */

    }

    public function allOptions($widget)
    {
      /*  $branches = (new $widget())->_branch;
        $labels = (new $widget())->_branchLabel;
        $configs = (new $widget)->_config;

        $models = [];
        foreach ($branches as $key => $value) {

            $app = new ALLApp();
            $config = new Config();
            $app->configs = $config;
            $items = [];
            foreach ($configs as $k => $val)
                if (ZArrayHelper::isIn($k, $value))
                    $items[$k] = $val;

            $this->optionsFix($items, $widget, $app);
            $app->cards = [];

            $model = Az::$app->forms->former->model($app);

            if (ZArrayHelper::keyExists($key, $labels))
                $key = $labels[$key];

            $models[$key] = $model;
        }

        return $models;

    }


    public function propertsByCategory($category_id = null)
    {
        $core_option_types = CoreOptionType::find()
            ->all();

        if ($category_id) {

            $core_category = CoreCategory::findOne($category_id);

            $core_option_types = CoreOptionType::find()
                ->where([
                    'id' => $core_category->core_option_type_ids
                ])
                ->all();
        }

        $result = [];
        foreach ($core_option_types as $core_option_type) {

            $property_item = new ZProductPropertyItem();
            $property_item->name = $core_option_type->name;

            $core_option = CoreOption::find()
            ->where([
                'shop_option_type_id' => $core_option_type->id
            ])->all();

            foreach ($core_option as $option)
                $property_item->items[$option->id] = $option->name;

            $result[] = $property_item;
        }


        return $result;    */
    }


    public function filterFormItems($category_id = null)
    {
        $app = new ALLApp();

        $config = new Config();
        $app->configs = $config;

        $proporties = Az::$app->market->product->propertsByCategory($category_id);

        vdd($proporties);

        foreach ($proporties as $property) {

            $column = new ZForm();
            $column->title = $property->name;
            $column->widget = ZGAccordionWidget::class;
            $column->options = [
                'config' => [
                    'content' => ZMCheckboxGroupWidget::widget([

                        'data' => $property->items,
                        'name' => 'ZDynamicModel',
                        //'value' => ['4']
                    ]),
                    'title' => $property->name
                ]
            ];
            //$column->data = $property->items;
            $app->columns[$property->name] = $column;
        }

        $app->cards = [];
        $model = Az::$app->forms->former->model($app);

        return $model;
    }



    private function fix($category)
    {
        /** @var ShopProduct $category */
        $ids = $category->core_option_ids;

        $items = [];
        foreach ($ids as $id)
            $items[] = (int)$id;

        return $items;
    }

    /*
     * $category = CoreCategory::findOne($model->shop_category_id);
            $core_option_type_ids = array_map(function ($id){
                return (int)$id;
            }, $category->core_option_type_ids);

            $combination_core_option_types = CoreOptionType::find()
                ->where([
                    'id' => $core_option_type_ids,
                ])
                ->andWhere([
                    'is_combination' => true
                ])
                ->all();
                vdd($core_option_type_ids);
            $core_option_types = [];
            foreach ($core_option_type_ids as $a)
            {
                $core_option_types[] = CoreOptionType::findOne($a);
            }
            vdd($core_option_types);*/


    private function coreProduct()
    {

        $model = new ShopProduct();

        $category = ShopCategory::findOne($model->shop_category_id);
        $core_option_type_ids = $this->fix($category);

        return ShopOptionType::find()
            ->where([
                'id' => $core_option_type_ids,
            ])
            ->andWhere([
                'is_combination' => true
            ])
            ->all();
    }

    public function azim()
    {


        $categories = Category::find()
            ->all();

        foreach ($categories as $category) {
            print_r($category->name);
        }

    }

    private function scanValidators()
    {

        $files = ZFileHelper::scanFilesPHP(Root . '/system/validate');

        $items = [];

        foreach ($files as $file)
            $items[] = ZInflector::classAll($file);

        return $items;
    }


    public function saveModels()
    {

        $core = new DragConfigDb();

        $core->configs->rules = [
            [validatorSafe]
        ];
        $core->class_name = 'asdasdasd';
        $core->icon = 'asdasdasd';
        $core->save();

    }


    private function micro()
    {

        Az::$app->tests->micro::start();
        sleep(1);

        vdd(Az::$app->tests->micro::end());

    }


    public function test11()
    {

        echo ZButtonWidget::widget([
            'config' => [
                'title' => 'Ссылка',
                'icon' => 'fas fa-external-link-alt',
                'pjax' => 0,
                'btnRounded' => false,
                'btn' => false,
                'hasIcon' => true,
            ],
            'event' => [
                'click' => 'function (event){e.preventDefault(); window.open(this.href, "_blank")}',
            ],
        ]);


        $model = new EyufProgramForm();


        /** @var ZView $this */
        $model->configs->filter = true;
        $model->configs->pageSummary = true;

        /*       $app = new CoreTest();
               $app->file = ['asdfasdfsadf'];
               $app->save();*/

        $cc = 'zetsoft\models\user\User';

        $app = new $cc();
        $app->file = ['asdfasdfsadf'];
        $app->save();

        vdd($app->id);
    }


    /**
     * creates new application
     * Function  actionCreate
     * @param $app - application name - string [0, 5]
     */
    public function actionCreate($app, $domain)
    {
        Az::debug($app, 'application');

        Az::$app->smart->adder->create($app, $domain);
    }

    /**
     * Clones an application
     * Function  actionClone
     * @param $app - application name to clone
     * @param $newApp - new application name - string [0, 5]
     */
    public function actionClone($app, $newApp, $domain)
    {
        Az::debug($app, 'application to clone');
        Az::debug($newApp, 'new application name');
        Az::$app->smart->adder->clone($app, $newApp, $domain);
    }

    /**
     * Extracts an application
     * Function  actionExtract
     * @param $app
     * @param $destination
     */
    public function actionExtract($app, $destination)
    {
        Az::debug($app, 'application');
        Az::debug($destination, 'new location');
        Az::$app->smart->adder->extract($app, $destination);
    }

    /**
     * removes new application
     * Function  actionCreate
     * @param $app - application name to remove
     */
    public function actionRemove($app, $domain)
    {
        Az::debug($app, 'application');
        Az::$app->smart->adder->remove($app, $domain);
    }

    /**
     * removes new application
     * Function  actionCreate
     * @param $app - application name to remove
     */
    public function actionFiles($app)
    {
        Az::debug($app, 'application');
        Az::$app->smart->adder->test($app);
        //Az::$app->smart->norms->serviceAdd($app);
    }


    public function actionVhost($app, $domain)
    {
        Az::debug($domain, 'domain');
        Az::$app->smart->adder->updateNgnix($app, $domain, true);
        //Az::$app->smart->norms->serviceAdd($app);
    }


    /*public function actionRun()
    {
        Az::$app->smart->widget->getFormDb('name');

    }  */


    private function alexey()
    {
        $file = Root . '\webhtm\ALL\kernel\widget\class.php';

        $content = file_get_contents($file);
        Az::debug($content, 'content: ');

        /*$content = Az::$app->utility->pregs->pregReplace($content, '<!--BEGIN(.|\s)*?END-->', '');*/

        $content = Az::$app->utility->pregs->pregReplace($content, '<([a-z][a-z0-9]*)[^>]*?(\/?)>', '<$1$2>');

        Az::debug($content, 'result: ');

        //$test = $dom->getElementsByTagName('div')->item(1);
        //$html = $dom->saveHTML();
    }

    private function getHtmlComments()
    {
        $file = Root . '\webhtm\ALL\kernel\widget\classs.php';

        $content = file_get_contents($file);
        Az::debug($content, 'content: ');

        $content = Az::$app->utility->pregs->pregMatchAll($content, '<!--echo(.|\s)*?-->', '$1');

        Az::debug($content, 'result: ');
    }

    public function phars()
    {
        /*$tarPath  = '\cncmd\tester\\';
        $name     = 'test';
        $des    = '\cncmd';
        $root =  Root;*/

        $targetPath = '\control\\';
        $pharName = 'control';
        $desPath = '\control';
        $root = Root;

        return Az::$app->utility->phars->run(Root . $targetPath, $pharName, Root . $desPath, Root);
    }

    public function updateCache()
    {
        Az::$app->utility->assetz->run();
    }

    public function ajax()
    {
        $q = 'com';
        $out = ['results' => ['email' => '', 'text' => '']];
        return $out;
    }

    public function spreadsheet()
    {

    }

    public function testone()
    {
        $a = [];
        $a['asfas'][ZVarDumper::export(['adad' => 11313])] = 'sadfasdf';
        vdd($a);
    }

    public function testPuters()
    {
        $scholar = ScholarCoreFormDb::findOne([
            'id' => 1
        ]);

        $scholarsFromMulti = $scholar->getScholarTestsFromScholarTestIds();
        $scholarsFromMulti = $scholar->getScholarTestsFromScholartests();

        foreach ($scholarsFromMulti as $n => $model) {
            echo "Model #" . $n . ": \r\n";
            vd($model->attributes);
        }
        vdd(count(($scholarsFromMulti)));
    }


    private function pregMatch()
    {
        $model = new LanguageForm();


        $all = '
 /**
 *   @property \zetsoft\service\utility\Alert $alert
 *   @property \zetsoft\service\utility\Mails $mails
 *   @property \zetsoft\service\utility\Views $views
 *   @property \zetsoft\service\utility\Notify $notify
 *   @property \zetsoft\service\utility\UrlApp $urlApp
 *   @property Execs $execs
 *   @property Mains $mains
 */
        ';

        $aa = Az::$app->utility->pregs->pregMatchAll($all, '@property (.*) \$(.*)');

        vdd($aa);
    }

    private function joins()
    {

        /*select * from scholar s inner join document d on s.id = d.scholar_id where user_company_id = 40;*/
        /* SELECT* FROM DOCUMENT WHERE DOCUMENT."id" IN ( SELECT ID FROM scholar WHERE user_company_id = 40 )*/

        $query = EyufScholar::find()
            ->select('id')
            ->where([
                'user_company_id' => 40
            ])
            ->sql();

        $table = EyufDocument::find()
            ->where('"id" IN ' . $query)
            ->all();

        $second = EyufDocument::findAll(EyufScholar::find()
            ->select('id')
            ->where([
                'user_company_id' => 40
            ])
        );

        vdd($second);
    }

    private function linq2()
    {

        $docs = EyufDocument::find()
            /* ->where([
                 'need_verify' => true
             ])*/
            ->all();

        $docs = Linq::from($docs)
            ->where(function (EyufDocument $document) {
                return $document->scholar_id === 72;
            })
            ->toArray();

        vdd(count($docs));

    }

    private function closure()
    {
        $aa = static function (CoreInput $model) {
            $action = PageAction::find();

            return [
                'asfsa',
                '111',
            ];
        };

        return Az::$app->utility->pregs->refClosure($aa);
    }

    public function ttt()
    {
        $text = Az::$app->utility->mains->closure($this->closure());
        vdd($text);
    }

    public function lang()
    {
        $model = PlaceCountry::findOne(1);
        Az::$app->cores->langs->columnnew($model, $model->name, $model->name_lang);
    }

    public function calendar()
    {
        echo ZFullCalendarWidget::widget([]);
    }

    ///translate

    public function pdima()
    {
        echo UzCyrToLat::translit('Ўзбекистон ш щ ы') . EOL;
        echo UzLatToCyr::translit('O‘zbekiston o\' g\' sh ch is\'hoq SH Sh sH') . EOL;
        echo UzLatToCyr::translitHtml('<p class="text">O‘zbekiston Respublikasi</p>');
    }


    private function language()
    {
        Az::$app->language = 'en';
        $A = Az::l('Главная страница');
        vdd($A);
    }

    public function ZMultiViewWidget()
    {

        $model = $this->modelGet(EyufCompatriot::class, 6);
        /** @var ZView $this */

        echo ZMultiViewWidget::widget([
            'model' => $model,
            'attribute' => 'higher_education',
            'config' => [
                'formClass' => HigherEducationForm::class,
            ]
        ]);

    }

    public function ZMultiViewWidgetActive()
    {

        $model = $this->modelGet(EyufCompatriot::class, 6);
        /** @var ZView $this */


        echo ZMultiViewWidget::widget([
            'model' => $model,
            'attribute' => 'higher_education',
            'active' => CoreSetting::class,
        ]);

    }

    public function menutest()
    {
        $a = Az::$app->App->eyuf->menutest->create('mmenu');
        vd($a);
        /*  $id = 1168;

          $action = PageAction::findOne($id);
          $data = $action->data;
          $link = ZUrl::to([$data]);*/


        //  vdd($data);
    }

    public function mails()
    {


    }

    public function el()
    {
        $file = ChatMessage::find()
            ->select('file')
            ->where([
                'sender' => 84,
                'read' => 20
            ])
            ->orWhere([
                'sender' => 20,
                'receiver' => 84
            ])->one();
    }

    public function actionModel()
    {

        $this->CoreNews::find()->all();


    }


    public function actionForm()
    {


    }

    private function edits()
    {


        $docs = new EyufDocument();
        $docs->configs->query = EyufDocument::find()
            ->where([
                'scholar_id' => 72
            ]);

        $docs->configs->edit = true;

        if ($this->userRole() === 'scholar') {
            $docs->configs->nameOff = [
                'correct'
            ];
            $docs->configs->editsEx = [
                'status',
                'correct',
                'comment'
            ];
        }

        /** @var ZView $this */
        echo ZDynaWidget::widget([
            'model' => $docs,
            'config' => [
                'title' => 'Мои документы',
                'titleCreate' => 'Добавить документ',
                'actionClone' => false,
                'actionDelete' => false,
                'topFilter' => false,
                'columnCheckbox' => false,
                'topSort' => false,
                'createUrl' => '/logics/scholar/doc-add.aspx',
                'viewUrl' => '/logics/scholar/doc-show',
                'updateUrl' => '/logics/scholar/doc-update',
                'btnEdit' => function ($url, $model) {
                    if ($model->status !== true)
                        return ZButtonWidget::widget([
                            'config' => [
                                'title' => Az::l('Изменить'),
                                'url' => '/eyuf/logics/scholar/doc-update.aspx?id=' . $model->id,
                                'hasIcon' => true,
                                'btnRounded' => false,
                                'btn' => false,
                                'icon' => 'fa fa-' . FA::_EDIT,
                                'confirm' => 'Are you sure you want DELETE columns?'
                            ]
                        ]);
                }
            ],

        ]);


        /*     $model = new User();
             $model->id = 1000;
             $model->title = 'qwr';
             $model->phone = '241623';
             $model->title = 'RTDFY';
             $model->email = 'EW@WE.WE';

             Az::$app->App->eyuf->main->scholarSave($model);*/
    }


    private function testModel()
    {
        /*     Az::$app->smart->visuals->normsForm();*/


    }


    private function urls()
    {

        $this->urlRedirect(['/eyuf/cores/main/index'], true);
// $this->urlRefresh();
        $to = $this->urlTo(['/eyuf/cores/main/index']);
        vdd(Az::$app->utility->urlApp->getScheme());
        vd($this->urlGetBase());
        vd($this->urlGetBack());
        vdd($this->urlGetMain());

// vdd($this->urlCheck(['/eyuf/cores/main/index2']));
// $this->urlGetBack();
// vdd($to);
// $this->urlRedirect([]);
    }

    public function models()
    {

        $model = new PageAction();
        $model->name = '111';


        $modelFilled = PageAction::findOne(1138);
        $modelFilled->name = '2222';


        $attributes = $model->attributes;
        $columnList = $model->columnsList();
        $titles = $model->attributeLabels();
        $columns = $model->columns;
        $allapp = $model->allApp();


        $form = new AuthPhoneForm();
        $titlesForm = $form->attributeLabels();
        $columnsForm = $form->columns;
        $allappForm = $form->allApp();


        $data = $form->columns['type']->data;


        vdd($data['cell']);


    }


    private function Word()
    {
        $word = Az::$app->App->eyuf->word->test();
        //dd($word);
    }


    private function teststatus($id)
    {
        /** @var EyufScholar $scholar */
        $scholar = EyufScholar::findOne([
            'id' => $id
        ]);
        $docs = EyufDocument::findAll([
            'scholar_id' => $scholar->id
        ]);
        $status = EyufScholar::status['stipend'];
        foreach ($docs as $doc) {
            if ($doc->status === false)
                $status = EyufScholar::status['docReady'];
        }
        $scholar->status = $status;
        $scholar->configs->rules = [
            [validatorSafe]
        ];
        if ($scholar->save())
            vd('OK');
    }

    private function map()
    {
        echo ZMMmenuWidgetMapNew::widget([
            'config' => [
                'content.img.width' => 80,
                'iconbar.top' => [
                    "<a href='#/'><i class='fa fa-home'></i>cc</a>",
                    "<a href='#/'><i class='fa fa-home'></i>cc</a>",
                ],
                'iconbar.bottom' => [
                    "<a href='#/'><i class='fa fa-home'></i>aa</a>",
                    "<a href='#/'><i class='fa fa-home'></i>cc</a>",
                ],
                'all.border' => ZMmenuWidget::border['border-full'],
            ],
        ]);

    }

    public function dilshod()
    {
        $scholar = (new EyufScholar())->attributeLabels();

        $htm = '<ol>';
        foreach ($scholar as $item) {
            $htm .= '<li>' . $item . '</li>';
        }
        $htm .= '</ol>';
        vdd($htm);
    }

    public function sunnat10()
    {

        Az::$app->utility->mailer->run();
        //   vdd(12);

    }


    public function repl()
    {
        $model = new EyufScholar();

        /* $model->configs->column = [
             'user_id' => function (FormDb $column) {

                 $column->index = true;
                 $column->indexUnique = true;
                 $column->dbType = dbTypeInteger;
                 $column->title = Az::l('Пользователь');
                 $column->widget = ZKSelect2Widget::class;
                 $column->options = [
                     'config' => [
                         'readonly' => true
                     ]
                 ];

                 return $column;
             },
         ];*/

        $cl = $model->columns;

        vd($cl);
        vdd($model->configs());


    }

    public function TT()
    {
        $user = User::findOne(['email' => 'shaxzodbek.qambaraliyev@gmail.com']);
        $scholar = $this->getScholar($user);
        $doctypes = $this->getDocumentTypes($scholar);
        $list = $this->makeDocumentList($scholar, $doctypes);
        /*print_r($list);*/
    }

    public function makeDocumentList($scholar, $doctypes)
    {
        $return = [];
        $documents = EyufDocument::findAll([
            'scholar_id' => $scholar->id,
        ]);
        foreach ($doctypes as $type) {
            $res = [
                'type' => $type,
                'document' => null
            ];
            foreach ($documents as $doc) {
                if ($doc->document_type_id == $type->id)
                    $res['document'] = $doc;
            }
            $return[] = $res;
        }
        return $return;
    }

    public function getScholar(User $user)
    {
        return EyufScholar::findOne(['user_id' => $user->id]);
    }

    public function getDocumentTypes(EyufScholar $scholar)
    {

        $docTypes = EyufDocumentType::find()->all();
        $return = [];
        foreach ($docTypes as $type) {
            foreach ($type->program as $program) {
                if ($program == $scholar->program)
                    $return[] = $type;
            }
        }
        return $return;
    }

    private function docList()
    {

        $test = Az::$app->App->eyuf->user->test();
        $list = Az::$app->App->eyuf->user->docList();

        echo $test;
        vd($list);

    }

    public function createNewUser()
    {
        $user = new User();
        $user->name = 'Shaxzod';
        $user->title = 'Shaxzodbek Qambaraliyev';
        $user->email = 'shaxzodbek.qambaraliyev@gmail.com';
        $user->password = '123123123';
        $user->verified_email = false;
        $user->save();
    }

    public function checkUser()
    {
        $user = User::findOne(['email' => 'shaxzodbek.qambaraliyev@gmail.com']);

        vd($user->verified_email);
    }


    public function confirmUser($params = [])
    {
        $user = User::findOne([
            'id' => $params['user_id'],
            'verify_code' => $params['code']
        ]);
        if ($user) {
            $user->verified_email = true;
            $user->update();
        }
    }

    public function sunnat4()
    {

        /** @var EyufScholar $so */
        $so = EyufScholar::findOne(10);

        $so->program = 'safasfas';
        //   vd($so->attributes);

        vdd($so->_program);
    }

    public function sunnat6()
    {
        $countries = PlaceCountry::find()->all();

        foreach ($countries as $key => $value) {

            $countA = EyufScholar::find()
                ->where(['place_country_id' => $value->id])
                ->count();
            $arrtest[$value->code] = $countA;

        }
        vdd($arrtest);

    }

    public function sunnat5()
    {

        $model = new EyufCompletedForm();
        $data = $this->sunnat3($model);
        $query = new ZArrayQuery();
        $query->from($data);
        return $query->all();

    }

    public function sunnat3($model)
    {
        $countries = PlaceCountry::find()->all();
        $arrtest = [];
        foreach ($countries as $key => $value) {

            foreach (EyufScholar::program as $val) {

                $countA = EyufScholar::find()
                    ->where(['place_country_id' => $value->id])
                    ->count();

                $countB = EyufScholar::find()
                    ->where(['place_country_id' => $value->id])
                    ->andWhere(['completed' => 't'])
                    ->count();

                $countC = $countA - $countB;
                $form = clone $model;
                $form->name = $val;
                $form->completed = $countB;
                $form->uncompleted = $countC;
                $form->all = $countA;

                $arrtest[$value->code][$val] = $form;
            }
        }

        return $arrtest;


    }

    public function sunnat()
    {

        $countries = PlaceCountry::find()->all();

        foreach ($countries as $key => $value) {

            foreach (EyufScholar::program as $val) {

                $countA = EyufScholar::find()
                    ->where(['place_country_id' => $value->id])
                    ->count();

                $countB = EyufScholar::find()
                    ->where(['place_country_id' => $value->id])
                    ->andWhere(['completed' => 't'])
                    ->count();

                $countC = $countA - $countB;

                $arrtest[$value->code][$val]['name'] = $val;
                $arrtest[$value->code][$val]['bitirgan'] = $countB;
                $arrtest[$value->code][$val]['bitirmagan'] = $countC;
                $arrtest[$value->code][$val]['obshi'] = $countA;
            }
        }

        vdd($arrtest);
    }

    public function sunnat2()
    {

        $data = [];

        $model = new EyufProgramForm();

        $form = clone $model;
        $form->country = 'Russia';
        $form->masters = 100;
        $form->intern = 2200;
        $form->qualify = 200;
        $data[] = $form;

        $form = clone $model;
        $form->country = 'Uzb';
        $form->masters = 100;
        $form->intern = 2200;
        $form->qualify = 200;
        $data[] = $form;

        foreach ($model as $key => $val) {

        }

        vdd($data);

    }


    public function sunnat1()
    {

        $model = new EyufProgramForm();

        /** @var ZView $this */
        $data = Az::$app->App->eyuf->main->formByCountries($model);
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

        $app2->blocks = [];

        $model2 = Az::$app->forms->former->model($app2);

        echo '';
//        $this->testdata();
//        $this->testAjax2();
//        $this->testBtn();
//        $this->wd();
    }


}
