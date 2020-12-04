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


require Root . '/vendori/utility/league/vendor/autoload.php';

use asrorz\frame\ZActive;
use Carbon\Carbon;
use crodas\FileUtil\File;
use Fusonic\Linq\Linq;
use kcfinder\type_mime;
use pdima88\uztranslit\UzCyrToLat;
use pdima88\uztranslit\UzLatToCyr;
use rmrevin\yii\fontawesome\FA;
use rmrevin\yii\fontawesome\FAS;
use setasign\Fpdi\PdfParser\Type\PdfNumeric;
use yii\db\Query;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\dbitem\elfin\ElfinderContextMenu;
use zetsoft\dbitem\elfin\ElfinderItem;
use zetsoft\dbitem\map\StipendItem;
use zetsoft\former\auth\PhoneForm;
use zetsoft\former\core\CoreServiceForm;
use zetsoft\former\eyuf\CompletedForm;
use zetsoft\former\eyuf\HigherEducationForm;
use zetsoft\former\eyuf\ProgramForm;
use zetsoft\former\lang\LanguageForm;
use zetsoft\former\shop\DailyReportForm;
use zetsoft\former\shop\ShopOptionTypeForm;
use zetsoft\former\test\TestLaptopForm;
use zetsoft\models\ALL\Test;
use zetsoft\models\ALL\Test3;
use zetsoft\models\App\eyuf\Card;
use zetsoft\models\App\eyuf\db2\CallsCdr;
use zetsoft\models\App\eyuf\EyufCompatriot;
use zetsoft\models\App\eyuf\EyufDocument;
use zetsoft\models\App\eyuf\EyufDocumentType;
use zetsoft\models\App\eyuf\EyufScholar;
use zetsoft\models\App\eyuf\ScholarTest;
use zetsoft\models\App\eyuf\TreeProduct;
use zetsoft\models\auto\ChatMessage;
use zetsoft\models\core\CoreInput;
use zetsoft\models\core\CoreSession;
use zetsoft\models\core\CoreSetting;
use zetsoft\models\drag\DragConfigDb;
use zetsoft\models\dyna\DynaChessQuery;
use zetsoft\models\page\PageAction;
use zetsoft\models\page\PageViewType;
use zetsoft\models\place\PlaceAdress;
use zetsoft\models\place\PlaceAdressThree;
use zetsoft\models\place\PlaceAdressTwo;
use zetsoft\models\place\PlaceCountry;
use zetsoft\models\place\AsrorForm;
use zetsoft\models\place\PlaceRegion;
use zetsoft\models\shop\Product;
use zetsoft\models\shop\ShopCatalog;
use zetsoft\models\shop\ShopCatalogWare;
use zetsoft\models\shop\ShopCategory;
use zetsoft\models\shop\ShopOption;
use zetsoft\models\shop\ShopOptionType;
use zetsoft\models\shop\ShopOrder;
use zetsoft\models\shop\ShopOrderCopy;
use zetsoft\models\shop\ShopOrderItem;
use zetsoft\models\shop\ShopProduct;
use zetsoft\models\shop\ShopShipment;
use zetsoft\models\test\TestAsror2;
use zetsoft\models\test\TestDep;
use zetsoft\models\test\TestOrder;
use zetsoft\models\test\TestStudent;
use zetsoft\models\user\User;
use zetsoft\models\ware\WareEnterItem;
use zetsoft\service\acme\YaacAcmeTest;
use zetsoft\service\cores\Category;
use zetsoft\service\cores\Subscribe;
use zetsoft\service\menu\ALL;
use zetsoft\service\utility\Execs;
use zetsoft\system\actives\ZActiveQuery;
use zetsoft\system\actives\ZArrayQuery;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZVarDumper;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\blocks\ZElfinderWidget;
use zetsoft\widgets\blocks\ZFullCalendarWidget;
use zetsoft\widgets\former\ZDynaWidget;
use zetsoft\widgets\incores\ZMCheckboxGroupWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZImgCheckboxGroupWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKDateRangePickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKTouchSpinWidget;
use zetsoft\widgets\inputes\ZPeriodPickerWidget;
use zetsoft\widgets\menus\ZMmenuWidget;
use zetsoft\widgets\navigat\ZButtonWidget;
use zetsoft\widgets\navigat\ZGAccordionWidget;
use zetsoft\widgets\values\ZMultiViewWidget;

//require Root . '/ventest/phar/vendor/autoload.php';

class Test1Controller extends ZControlCmd
{

    #region Main

    public function notify()
    {
        $this->notifyInfo('1111', 'safsa1dsa', 'admin', 'mail.ru');
        $this->notifyInfo('31313', 'safsa1dsa', 'admin', 'mail.ru');
        $this->notifyInfo('11131311', 'safsa1dsa', 'admin', 'mail.ru');
        $this->notifyInfo('1111', 'safsadsa', 76);

        $data = Az::$app->utility->notify->notifies();
        vd($data);
    }

    public function actionRun()
    {


        $model = new TestStudent();
        $model->branch = TestStudent::branch['front'];
        $model->age = 222;
        $model->email = 'asror.zk@gmail.com';
        echo $model->save();


        /*   $model = EyufDocument::findOne(14);

           vd($model->rules());*/

        //   Az::$app->App->eyuf->user->clean();

        //$this->readonlyee();
        ///     $this->file();

        /*

        $webhrest = Az::$app->smart->migra->category();
            foreach ($webhrest as $webrest) {
                $folder = '@zetsoft/models/' . $webrest;

            }*/

        // Az::$app->cores->menus->create();

        /*  $item = new StipendItem();
          //$item->table = Az::$app->App->eyuf->main->table();
          $item->names = Az::$app->App->eyuf->main->getNames();
          $item->datas = Az::$app->App->eyuf->main->statbycounty();
          $item->counts = Az::$app->App->eyuf->main->countsbycounty();*/


        /*
            vd($model->configs->changeSave);
            vd($model->configs->changeReload);
        */


        //  return Az::$app->cores->menus->crudsTest();
        //  $model = PlaceAdressThree::findOne(3);


        //Az::$app->market->element->saveElementNewTest();
        //    Az::$app->market->element->combinationsTest();
        // Az::$app->market->element->saveElementsTest();
        //  Az::$app->maths->combine->test();

        //    Az::$app->maths->combine->combinateProductElement(2);


        //  echo   Az::$app->forms->ajaxData->multiRemoveTest();

        /*

           $model = new ShopOptionTypeForm();
           $model->columns();

           vdd($model->configs->ajax);
           return Az::$app->forms->ajaxData->autoSaveTest();
        
        */

        //   return Az::$app->utility->pregs->multiIndexTest();


        //  $this->tranz();


        /*     $this->paramSet(paramTransact, true);
             $model = PlaceAdress::findOne(366);

             $model->place_country_id = 5675754;
             $model->place_region_id = 13131;
             $model->region_form = ['13131'];
             $model->save();

             vd($model->attributes);*/

    }




    #endregion

    #region Tests


    public function file()
    {
        $model = EyufDocument::findOne(49);
        $attr = 'file';
        $rename = Az::$app->forms->modelz->uploadFile($model, $attr);

        vdd($rename);
    }

    public function readonlyee()
    {

        $model = EyufDocument::findOne([
            'id' => 45
        ]);
        vd($model->columns['id']->readonly);
        //     vd($model->columns['id']->readonlyKernel);
    }

    public function fff()
    {


        //    $this->paramSet(paramTransact, true);
        /*   $app = Az::$app->menu->aLL->models();
           vdd(Az::$app->menu->aLL->items);*/


//        return Az::$app->cores->menus->titlesTest();


        //  Az::$app->cores->buildWeb->update(PageViewType::class);
        //Az::$app->cores->buildWeb->delete(PageViewType::class);


        /*
                $path = 'C:\AsrorZ\asrorz\zetsoft/webhtm/shop/seller';

                $folder = ZFileHelper::scanFolder($path);
                vd($folder);
                $files = ZFileHelper::scanFilesPHP($path);
                vd($files);*/

    }


    public function rules()
    {


        // rules
        /*        $model->configs->rules = [
                    [validatorSafe]
                ];*/


        /*   $model->configs->options = validatorSafe;

           $model->configs->rules = [
               'number' => [validatorEmail]
           ];

           $model->configs->options = [
               'id' => 'sadfsa',
               'model' => 'sadfsa',
               'config' => [
                   'ajax' => false,
                   'datas' => [
                       'safsa',
                       'safsa',
                       'safsa',
                   ],
               ]
           ];*/
        /*
                */

        $model = new TestOrder();
        $model->columns();


        // vd($model->configs);

        vd($model->configs->changeReload);

        vd($model->configs->options);


        //      $model->configs->rules = validatorEmail;

        /*
                $model->columns['user_id']->rules = [
                    [validatorSafe]
                ];
                $model->columns['number']->rules = [
                    [validatorSafe]
                ];*/

        // options

//
        $model->columns();

        //vd($order->save());

        /*   vdd($model->configs->rules);
           vdd($model->columns['number']->rules);*/


    }

    public function datas()
    {

        $model = TestOrder::findOne([
            'id' => 86
        ]);

        $model->configs->data = [
            'user_id' => [
                'sadf',
                'sadf',
                'sadf',
            ]
        ];

        $model->columns();

        //   vd('data');

        $app = $model->columns['user_id']->data;

        vd($app);
    }

    public function showDyna()
    {

        $model = TestOrder::findOne([
            'id' => 86
        ]);

        $model->columns();

        vd('MINME');

        $app = $model->columns['user_id']->showDyna;
        $app2 = $model->columns['user_id']->showDyna;
        $app3 = $model->columns['number']->showForm;

        vd($app);
//        vd($app2($model));
        //      vd($app3($model));

    }

    public function readonly()
    {

        $model = TestOrder::findOne([
            'id' => 86
        ]);

        $model->configs->readonly = function ($model) {
            if ($model['id'] > 80)
                $data = true;
            else
                $data = false;

            return $data;
        };

        $model->columns();

        vd('MINME');

        $app = $model->columns['user_id']->readonly;
        $app2 = $model->columns['user_id']->readonly;
        $app3 = $model->columns['number']->readonly;

        vd($app($model));
        vd($app2($model));
        vd($app3($model));

    }


    public function testCallableExec()
    {
        $model = TestOrder::findOne(['id' => 86]);
        $model->configs->widget = [
            'user_id' => function ($model) {
                if ($model->id === 86)
                    return ZKDateRangePickerWidget::class;
                else
                    return ZKTouchSpinWidget::class;
            }
        ];

        $model->columns();

        vd('MINME');

        $app = $model->columns['user_id']->widget;
        $app2 = $model->columns['user_id']->widget;

        vd($app);
        vd($app2);
    }

    public function apps()
    {

        $model = TestOrder::findOne(['id' => 86]);
        $model->configs->readonly = [
            'user_id' => function ($model) {
                if ($model->id === 86)
                    return ZKDateRangePickerWidget::class;
                else
                    return ZKTouchSpinWidget::class;
            }
        ];

        $model->columns();

        vd('MINME');

        $app = $model->columns['user_id']->widget;
        $app2 = $model->columns['user_id']->widget;

        vd($app);
        vd($app2);
        //  vd($model->rules());
    }

    public function dynamic2()
    {


        $a = Az::$app->forms->ajaxData->autoSaveTest();
        vd($a);

        /*      Az::$app->forms->wiData->clean();
              Az::$app->forms->wiData->fkTable = PlaceRegion::class;
              Az::$app->forms->wiData->fkAttr = 'name';
              Az::$app->forms->wiData->fkQuery = [
                  'parent_id' => 57
              ];
              $data = Az::$app->forms->wiData->related();
              vd($data);*/


        //   $model = $this->modelGet(TestAsror2::class, 111);

        /*    $app = new ALLApp();

            $form = new Form();
            $form->title = 'rg';
            $form->changeReloadId = '#asrorz';
            $app->columns['name'] = $form;

            $form = new Form();
            $form->title = 'wddadadaddd';
            $form->changeReloadId = '#asrorz';
            $form->auto = true;
            $form->widget = function ($model) {
                //  vdd($model);

                return $model->name;
            };
            $app->columns['title'] = $form;

            $object = Az::$app->forms->former->model($app);

            vdd($object);*/

    }


    public function val()
    {
        $model = DynaChessQuery::findOne(6);
        $model->kernel();
        $coumn = $model->columns['val'];
        vdd($coumn->options);
    }

    public function tranzGet()
    {
        $order2 = ShopOrderCopy::findOne(11732);
        vd($order2->user_id);
        vd($order2->price);
    }

    public function dynafix()
    {


        $model = new TestAsror2();
        $model->name = 'adadadad';
        $model->region = ['sdaf'];
        $model->save();

        /*
                $model = Az::$app->forms->dynas->dynamicModel();
                $data = Az::$app->forms->dynas->dynamicTest($model);*/


        //   $a = new User();

        /*
         *        $b = \Opis\Closure\unserialize(\Opis\Closure\serialize($a));
                $b->configs->tooltip = 'adadadada';

                $c = \Opis\Closure\unserialize(\Opis\Closure\serialize($a));
                $c->configs->tooltip = 'TTTTTTTTTTTTTTTT';

         * */

        /*    $b = clone $a;
            $b->configs->tooltip = 'adadadada';

            $c = clone $a;
            $c->configs->tooltip = 'TTTTTTTTTTTTTTTT';

            vd($b->configs->tooltip);
            vd($c->configs->tooltip);*/
        /*
                vd($b->configs->tooltip);
                vd($c->configs->tooltip);*/

        /*     echo ZDynaWidget::widget([
                 'model' => $model,
                 'data' => $data,
                 'type' => ZDynaWidget::type['form'],
             ]);*/


    }

    public function dynamic()
    {

        $model = new TestLaptopForm();

        /*
        $dynamicModel = new ZDynamicModel($model->getAttributes());
        //$dynamicModel->addRule($attribute, 'safe');
        $dynamicModel->setAttributeLabels($model->attributeLabels());*/

        $app = $model->allApp();
//vdd($app);
        $model = Az::$app->forms->former->model($app);


        vdd($model);
    }

    public function tranz()
    {

        $this->paramSet(paramTransact, true);

        $order2 = new ShopOrderCopy;
        $order2->user_id = 11;
        $order2->price = 33;
        $order2->contact_name = '131313';
        $order2->contact_phone = '4444';
        $order2->save();

        $order2 = ShopOrderCopy::findLast();
        $order2->contact_name = '1sdgsdfgd31313';
        $order2->contact_phone = 'dfasdsgsdfgdfsg4444';

        vd($order2->id);
        vd($order2->contact_name);
        vd($order2->contact_phone);

        $order2->contact_phone = '6435467577';
        vd($order2->contact_phone);
        //      vd($order2->save());
        /*
                $order2 = new CoreSession();
                vd($order2->save());*/


        /* $order2 = TestOrder::findOne(58);
         $order2->user_id = 100;
         $order2->code = 'AAA';
         $order2->price = random_int(1, 134131);
         $order2->contact_name = '1414';
         $order2->contact_phone = '1414';
         $order2->save();*/


        /*     */


    }

    public function alls()
    {
        /*        $model = ShopCatalogWare::findOne(531);
                $model->configs->showDeleted = false;*/
        $all = ShopCatalog::find()
            ->where([
                'id' => 12355
            ])
            ->asArray()
            ->all();

        vd($all);
    }


    public function ff()
    {
        $date = Carbon::now()->locale('xx', 'xy', 'es')->sub('3 days 6 hours 40 minutes');

        echo $date->ago(['parts' => 3]); // hace 3 Xday 6 Yhour 40 minutos

    }

    public function valid()
    {

        $region = new PlaceRegion();

        $region->configs->rules = [
            'title' => [
                [
                    validatorSafe
                ]
            ],
            /*   'name' => [
                   [
                       validatorRequired
                   ]
               ]*/
        ];

        //   $region->columns['title']->rules = validatorMatch;

        $region->columns();

        $region->ware_id = 13;
        $region->place_country_id = 56;
        $region->parent_id = 56;
        $region->save();


        /*     $placeAdress = PlaceAdress::findOne(304);
             $placeAdress->configs->rules = [
                 'place' => [
                     [validatorSafe]
                 ]
             ];
             $placeAdress->columns();
             vdd($placeAdress);*/
    }

    public function validShip()
    {

        $region = new ShopShipment();
        $region->ware_id = 13;
        $region->place_country_id = 56;
        $region->title = 'sdfasdaf';
        $region->save();

        /*     $placeAdress = PlaceAdress::findOne(304);
             $placeAdress->configs->rules = [
                 'place' => [
                     [validatorSafe]
                 ]
             ];
             $placeAdress->columns();
             vdd($placeAdress);*/
    }

    public function parse()
    {
        Az::$app->office->officeConvert->exampleOne();
//         Az::$app->parser->tinyHtmlMinifier->example();
        //  Az::$app->office->wordpdf->multiContractTest();

        //    Az::$app->office->docto->docPdfTest();
    }


    public function join()
    {

    }

    public function group()
    {

        $order = ShopOrder::findOne(475);

        $orderItems = ShopOrderItem::findAll([
            'shop_order_id' => $order->id
        ]);

        $data = [];
        foreach ($orderItems as $item) {
            $data[$item->ware_id][$item->user_company_id][] = $item;
        }


        vdd($data);


    }

    public function history()
    {
        $model = new ShopCatalogWare();
        $model->amount = 141;
        $model->save();

        $this->paramSet('paramSecondSave', false);
        $model = ShopCatalogWare::findOne($model->id);
        $model->amount = 333;
        $model->save();

        $this->paramSet('paramSecondSave', false);
        $model = ShopCatalogWare::findOne($model->id);
        $model->amount = 13541;
        $model->save();

    }

    public function catWare()
    {

        $date = '2020-08-14';
        //$model = collect(WareEnterItem::findBySql("SELECT * FROM ware_enter_item WHERE created_at::date < '$date';")->all());
        $result = [];
        $array = [];
        foreach ($model as $key => $item) {
            if (isset($array[$item['shop_element_id']][$item['best_before']])) {
                $result[$array[$item['shop_element_id']][$item['best_before']]]->before_amount += $item['amount'];
//                if ($item['created_at'] === date('YYYY-m-d')) {
//                    $result[$array[$item['shop_element_id']][$item['best_before']]]->enter_amount += $item['amount'];
//                }
            } else {
                $array[$item['shop_element_id']][$item['best_before']] = $key;
                $form = new DailyReportForm();
                $form->shop_catalog_id = ShopCatalog::findOne(['shop_element_id' => $item['shop_element_id']])->id;
                $form->best_before = $item['best_before'];
                $form->before_amount = $item['amount'];
                // vdd(WareEnterItem::findBySql("SELECT * FROM ware_enter_item WHERE shop_element_id = '{$item['shop_element_id']}' AND best_before = '{$item['best_before']}' AND created_at::date = '$date'")->all());
                //$form->enter_amount = collect(WareEnterItem::findBySql("SELECT * FROM ware_enter_item WHERE shop_element_id = '{$item['shop_element_id']}' AND best_before = '{$item['best_before']}' AND created_at::date = '$date'")->all())->sum('amount');
                $result[] = $form;
            }
        }

        /*        $data = ShopCategory::find()->where([
                    'id' => 1631
                ])
                    ->asArray()
                    ->one();
                $data = $this->toObject(ShopCategory::class, $data);
                vdd($data);*/
        //  $orders = ShopOrder::find()->limit(10000)->asArray()->all();

        /*      $model = new ShopCatalogWare();

              $model->shop_catalog_id = 1494;*/


        //  $models = Az::$app->market->category->generateDBMenuItems();

        /*  $models = ShopCatalogWare::find()
              ->where([
                  'id' => [
                      10, 13
                  ]
              ])
              ->all();*/


        //$model->save();

        //vdd($model->attributes);

    }


    public function elfind()
    {

        $data = [];
        $item = new ElfinderItem();

        $item->path = Root . '/webhtm';
        $item->url = '/webhtm';
        $data[] = $item;


        /**
         * Context
         */

        $context = [];

        $menu = new ElfinderContextMenu();

        $menu->title = Az::l('Edit in grapes');

        $menu->icon = FAS::_YOAST;

        $menu->name = 'grape';

        $menu->iconUrl = "https://img.icons8.com/ios-glyphs/60/000000/cinema---v2.png";

        $menu->url = '/core/kernel/widget/samplewidgetnorm.aspx?path={fileNameNoExt}';

        $context[] = $menu;

        $menu = new ElfinderContextMenu();

        $menu->title = Az::l('Open Page');

        $menu->name = 'pageOpen';

        $menu->iconUrl = "https://img.icons8.com/ios-glyphs/60/000000/cinema---v2.png";

        $menu->icon = FAS::_YOAST;

        $menu->url = '/core/tester/asror/main.aspx?path={fileNameNoExt}.apx';

        $context[] = $menu;

        echo ZElfinderWidget::widget([

            'config' => [
                'context' => $context,

                'type' => [
                    'text/x-php',
                    'text/html',
                    'directory',
                ],

                'mode' => ZElfinderWidget::mode['edit'],

                'handler' => '/core/tester/asror/main.aspx?path=render/{fileNameNoExt}'

            ],

            'data' => $data,
        ]);


    }


    public function ttt()
    {

        $app = new ALLApp();

        $config = new Config();
        $app->configs = $config;

        switch (true) {

            case $filterForm->operator === 'between':

                $column = new Form();
                $column->title = Az::l('Значение 1');
                $column->widget = ZKDatepickerWidget::class;
                $column->rules = [
                    [
                        validatorRequired,
                    ],
                ];

                $columns['value1'] = $column;

                $column = new Form();
                $column->title = Az::l('Значение 2');
                $column->widget = ZKDatepickerWidget::class;
                $column->rules = [
                    [
                        validatorRequired,
                    ],
                ];

                $columns['value2'] = $column;

                break;


            default:


                $model = null;
                if ($filterForm->models) {
                    $modelClass = Az::$app->forms->dynas->bootFull($filterForm->models);
                    $model = new $modelClass();
                }

                $widget = ZHInputWidget::class;

                if ($model) {
                    if (!empty($filterForm->attr)) {
                        $column = $model->columns[$filterForm->attr];
                        $widget = $column->widget;
                    }

                    if (empty($filterForm->models))
                        $widget = ZHInputWidget::class;

                    if ($filterForm->operator === 'between')
                        $widget = ZPeriodPickerWidget::class;
                }

                $column = new Form();
                $column->title = Az::l('Значение');
                $column->widget = $widget;
                $column->rules = [
                    [
                        validatorRequired,
                    ],
                ];

                $columns['value'] = $column;

                break;
        }

        $app->columns = $columns;
    }

    public function dyna()
    {
        Az::$app->forms->dynas->test();
    }

    public function ship()
    {
        $user = new ShopShipment();

        //$user->name = 'asfsda';
        $user->status = '13';
        $user->shop_courier_id = '13';
        $user->shipment_type = 'international';
        $a = $user->save();
        vd($a);
        vd($a);
        vd($a);
        vd($a);
        vd($a);

        for ($i = 1; $i <= 10000; $i++) {
            vd($i);
            sleep(1);
        }
    }

    public function menu()
    {

        $this->watchStart('111');
        //$a = Az::$app->market->category->generateDBMenuItems();
        $b = Az::$app->market->categoryOver->generateDBMenuItems();
        vdd($this->watchStop('111'));

    }

    public function link()
    {
        $value = [
            "page_module_id" => "19",
            "page_control_id" => "301",
            "page_action_id" => "707",
            "name" => "cccc",
        ];

        $attr = 'form';
        $model = TestDep::findOne(4);

        Az::$app->forms->wiData->clean();
        Az::$app->forms->wiData->model = $model;
        Az::$app->forms->wiData->attribute = $attr;

        $value = Az::$app->forms->wiData->value();
        //   vdd($value);

    }

    public function DilmurodLeftJoin()
    {

        $query = new Query;
        $query->select('user.name')
            ->from('user')
            ->join('LEFT JOIN', 'core_adress', 'user.id = core_adress.user_id');
        vdd($query->all());
    }

    public function DilmurodRightJoin()
    {
        $query = new Query;
        $query->select('core_adress.name')
            ->from('core_adress')
            ->join('LEFT JOIN', 'user', 'user.id = core_adress.user_id');
        vdd($query->all());
    }

    public function DilmurodJoinWith()
    {
        $model = User::find()
            ->select('user.name')
            ->joinWith('company')
            ->one();
        vdd($model);


    }

    public function rulesTest()
    {
        $user = new User();
        $user->email = null;
        $user->name = 'asdfad';
        $user->beforeSave(false);
        $user->password = 'saasdfasdff';


        /*        $user->configs->rules = [
                    [validatorSafe]
                ];*/
        /*        $user->configs->rules = [
                    'name' => [
                        [validatorSafe]
                    ]
                ];*/
        $user->configs->replace = [
            'name' => function (FormDb $column) {

                $column->title = Az::l('ФИО');
                $column->dbType = dbTypeString;
                $column->widget = ZHInputWidget::class;
                $column->pageSummary = false;
                $column->rules = [
                    [
                        validatorEmail,
                    ],
                    [
                        validatorUnique,
                    ],
                ];

                return $column;
            }
        ];
        $user->configs->column = [
            'name' => function (FormDb $column) {

                $column->title = Az::l('ФИО');
                $column->dbType = dbTypeString;
                $column->widget = ZHInputWidget::class;
                $column->pageSummary = false;
                $column->rules = [
                    [
                        validatorEmail,
                    ],
                    [
                        validatorUnique,
                    ],
                ];

                return $column;
            }
        ];

        $user->columns();


        $save = $user->save();
        vd($save);
    }

    public function titles()
    {
        $model = new PlaceCountry();

        $model->configs->titles = [
            "id" => "I131313D",
            "name" => "234124124",
            "name_lang" => "12341234",
        ];

        vdd($model->attributeLabels());
    }

    public function test()
    {
        $a = TreeProduct::find()->addOrderBy('root, lft');
        $b = $a->all();
        // vdd($a);
        vdd($b);
    }

    public function widgetImageCheckbox()
    {
        echo ZImgCheckboxGroupWidget::widget([
            'model' => new CoreInput(),
            'attribute' => 'string_1',
            'config' => [
                'radio' => true
            ],
        ]);
    }

    public function widgetImageCheckboxRadio()
    {
        echo ZImgCheckboxGroupWidget::widget([
            'model' => new CoreInput(),
            'attribute' => 'jsonb_1',
            'config' => [
                'type' => ZImgCheckboxGroupWidget::type['checkboxGroup'],
                'radio' => true
            ],
        ]);
    }

    private function asd()
    {
        $aa = DragConfigDb::findOne(369)->card;
        $return = [];
        foreach ($aa as $step) {

            $stepItems = ZArrayHelper::getValue($step, 'items');
            $newStep = [];
            $newStep['title'] = ZArrayHelper::getValue($step, 'title');
            $newStep['enable'] = ZArrayHelper::getValue($step, 'enable');

            foreach ($stepItems as $block) {

                $blockItems = ZArrayHelper::getValue($block, 'items');
                $newBlock = null;
                $newBlock['title'] = ZArrayHelper::getValue($block, 'title');
                $newBlock['enable'] = ZArrayHelper::getValue($block, 'enable');
                if (!empty($blockItems))
                    foreach ($blockItems as $blockItem) {
                        $newItem = null;
                        foreach ($blockItem as $item) {
                            foreach ($item as $name)
                                $newItem[] = $name;
                        }

                        $newBlock['items'][] = $newItem;
                    }

                $newStep['items'][] = $newBlock;
            }

            $return[] = $newStep;

        }

        return $return;

    }

    private function asd_old()
    {
        $aa = DragConfigDb::findOne(369)->card;
        $return = [];
        foreach ($aa as $step) {

            $stepItems = ZArrayHelper::getValue($step, 'items');
            $newStep = [];
            foreach ($stepItems as $block) {

                $blockItems = ZArrayHelper::getValue($block, 'items');
                $newBlock = [];

                if (!empty($blockItems))
                    foreach ($blockItems as $blockItem) {
                        $newItem = [];
                        foreach ($blockItem as $item) {
                            $newItem[] = $item;
                        }

                        $newBlock['items'] = $newItem;
                    }

                $newStep['items'][] = $newBlock;
            }

            $return[] = $newStep;

        }

        return $return;

    }

    public function currency()
    {
        $item = new ZProductItem();

        $item->name = ' aasfsadfsaf';
        $item->currencyType = ZProductItem::currency['usd'];
        $item->init();

        vd($item->currency);

    }

    public function coreOption()
    {
        $model = ShopCategory::findOne(1);
        foreach ($model->shop_option_type as $data) {
            vd($data);
        }

    }

    public function allOptions($widget)
    {
        $branches = (new $widget())->_branch;
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
        $core_option_types = ShopOptionType::find()
            ->all();

        if ($category_id) {

            $core_category = ShopCategory::findOne($category_id);

            $core_option_types = ShopOptionType::find()
                ->where([
                    'id' => $core_category->core_option_type_ids
                ])
                ->all();
        }

        $result = [];
        foreach ($core_option_types as $core_option_type) {

            $property_item = new ZProductPropertyItem();
            $property_item->name = $core_option_type->name;

            $core_option = ShopOption::find()
                ->where([
                    'shop_option_type_id' => $core_option_type->id
                ])->all();

            foreach ($core_option as $option)
                $property_item->items[$option->id] = $option->name;

            $result[] = $property_item;
        }


        return $result;
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


        $model = new ProgramForm();


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

        /*vdd($app->id);*/
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


        $form = new PhoneForm();
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

        $model = new CompletedForm();
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

        $model = new ProgramForm();

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

        $model = new ProgramForm();

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
                        validatorRequired,
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
                        validatorRequired,
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


    #endregion
}
