<?php
/**
 *
 * Author:  Asror Zakirov
 * Created: 29.06.2016 19:06
 * https://www.linkedin.com/in/asror-zakirov-166961a9
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 */

namespace zetsoft\cncmd\tester;


use rmrevin\yii\fontawesome\FA;
use zetsoft\former\core\ServiceForm;
use zetsoft\former\shop\SizeForm;
use zetsoft\former\test\TestDilshodForm;
use zetsoft\models\dyna\DynaChess;
use zetsoft\models\place\PlaceAdress;
use zetsoft\models\place\PlaceRegion;
use zetsoft\models\shop\ShopCatalog;
use zetsoft\models\shop\ShopCatalogWare;
use zetsoft\models\shop\ShopElement;
use zetsoft\models\shop\ShopOrder;
use zetsoft\models\shop\ShopOrderItem;
use zetsoft\models\shop\ShopReview;
use zetsoft\models\user\User;
use zetsoft\models\ware\WareAccept;
use zetsoft\service\forms\formerShax;
use zetsoft\service\market\Report;
use zetsoft\service\smart\Model;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\helpers\ZUrl;
use zetsoft\widgets\former\ZDynaWidget;
use zetsoft\widgets\former\ZFormBuildWidget;
use zetsoft\widgets\former\ZListViewWidget;
use zetsoft\widgets\navigat\ZButtonWidget;
use zetsoft\widgets\themes\ZCardWidget;


class DilshodController extends ZControlCmd
{
    public function actionRun()
    {
        /*$this->saveOrder();*/
        $this->countClass();

        /** @var ShopOrder $order */
       /* $orders = ShopOrder::find()->all();

        foreach ($orders as $order) {
            $order->configs->rules = validatorSafe;

            $order->columns();
            $order->save();
        }
       /* vdd(Az::$app->App->eyuf->grape->getServiceFolders());*/
       /*$model = new ShopOrder() ;

       vdd($model->rules());*/
       /*$this->configArrGet();*/
       /*$this->chessView();*/
       /*$this->clearShopCatalogWare();*/

    }

    public function saveOrder(){

        $order = new ShopOrder();
        $order->place_adress_id = 13131;
     //   $order->number = 13131;
        $order->save();

    }

    public function clearShopCatalogWare(){
        $wares = ShopCatalogWare::find()->all();
        /** @var ShopCatalogWare $ware */
        foreach ($wares as $ware){
             $catalog = ShopCatalog::findOne($ware->shop_catalog_id);
             if ($catalog === null){
                $ware->delete();
             }
        }
    }

    public function chessView(){
        $id = (int)2;
        $query = null;
        $modelClass = 'ShopCatalogWare';

        if (empty($id))
            throw new Exception('Необходимый параметр не найден');

        $post = $this->httpPost();

        if ($post) {
            $this->sessionSet('chess_filter_values', ZArrayHelper::getValue($post, 'ZDynamicModel'));
            $this->urlRefresh();
        }

        Az::$app->cores->chess->id = $id;
        Az::$app->cores->chess->query = $query;

        $filter_val = $this->sessionGet('chess_filter_values');

        if (is_array($filter_val)) {
            Az::$app->cores->chess->filter = $filter_val;
        }

        Az::$app->cores->chess->run();
        $footer = Az::$app->cores->chess->summaryCode;
        $model = Az::$app->cores->chess->dynamicModel;
        $data = Az::$app->cores->chess->data;
        $filter = Az::$app->cores->chess->filterModel;

        $chess = DynaChess::findOne($id);
        $title = '';
        if ($chess !== null) {
            $title = $chess->name;
        }

        ZCardWidget::begin([
            'config' => [
                'title' => $title
            ]
        ]);

       /* $form = $this->ajaxBegin();*/

        /*if ($filter !== null) {

            if (is_array($filter_val)) {
                $filter->setAttributes($filter_val);
            }

            echo ZFormBuildWidget::widget([
                'model' => $filter,
                'form' => $form,
                'config' => [
                    'topBtn' => false,
                    'botBtn' => false,
                ]
            ]);

            echo ZButtonWidget::widget([
                'config' => [
                    'text' => Az::l('Филтровать'),
                    'btnRounded' => false,
                    'btnSize' => ZButtonWidget::btnSize['btn-md'],
                    'btnType' => ZButtonWidget::btnType['submit']
                ]
            ]);

            echo ZButtonWidget::widget([
                'config' => [
                    'text' => Az::l('Сбросить фильтр'),
                    'btnRounded' => false,
                    'btnSize' => ZButtonWidget::btnSize['btn-md'],
                    'btnType' => ZButtonWidget::btnType['submit']
                ],
                'event' => [
                    'click' => <<<JS
            function x() {
                $.ajax({
                type: "POST",
                url: '/core/dynagrid/chess_clear_filter.aspx',
                success:  function() {
                       window.location.reload();
                },
            });
        }
JS,
                ]
            ]);

        }*/
       /* $this->ajaxEnd();*/

        /*$chess = ZButtonWidget::widget([
            'config' => [
                'hasIcon' => true,

                'title' => '',

                'target' => ZButtonWidget::target['_self'],

                'grapes' => false,

                'url' => ZUrl::to([

                    '/core/dynagrid/chess',
                    'modelClass' => $modelClass

                ]),

                'class' => 'pb-4 ml-1 rounded-0',
                'btnStyle' => ZButtonWidget::btnStyle['btn-transparent'],
                'btnRounded' => false,
                'icon' => 'fa fa-backward fa-lg' . FA::_CLIPBOARD,
            ],
        ]);*/

        /*$model->configs->dynaButtons = [

            'update' => [

                'content' => "{update}{$chess}",

                'options' => ['class' => 'btn-group p-1 mr-0 {btnSize} {iconSize}']

            ],

        ];*/

        /*echo ZDynaWidget::widget([

            'model' => $model,

            'data' => $data,

            'type' => ZDynaWidget::type['form'],

            'rightNameEx' => [
                'toggleData',
                'system',
                'add-clone-delete',

            ],
            'rightBtn' => [
                'key' => [
                    'content' => $chess,
                    'options' => [
                        'class' => 'btn-group p-1 mr-0 {btnSize} {iconSize}'
                    ]
                ]
            ],

            'config' => [
                'summary' => true,
                'copy' => false,
                'showPageSummary' => false,
                'search' => false,
                'columnAfter' => [
                    'false'
                ],
                'columnBefore' => [
                    'serial'
                ],
                'panelTemplate' => "{panelBefore}{items}{panelAfter}$footer{panelFooter}",
                'pjax' => false
            ]

        ]);*/

        ZCardWidget::end();
    }

    public function configArrGet(){
         $model = new ServiceForm();
         $model->configs->data = [
            'namespace' => function ($model){
                return [
                    'ef'
                ];
            }
         ];


        $res =  $model->configArrGet('data', $model->columns['namespace'], 'namespace');
         vdd($res->data);
    }


    private function old(){


        /*Az::$app->auto->FpbxExtsX->config();
//Az::$app->auto->FpbxExtsX->autoLogin();
Az::$app->auto->FpbxExtsX->createExtension();*/
        /* $property = 'user';
         $key = [
             "user_id" =>"id",
             "responsible" =>"id",
             "operator" =>"id",
             "deleted_by" =>"id",
             "created_by" =>"id",
             "modified_by" =>"id"
         ];

         vdd(ZVarDumper::beauty([$key => $property]));*/
        /*
                vdd(Az::$app->market->product->allProducts(978, null, 1, 12, [], null));*/
        /*$this->formTest();*/
        /* vdd(str_repeat('\t', 5));*/
        /* $this->getOneTest();*/
        /*$this->relate();*/
        /*$this->history();*/
        /*    $model  = new ShopOrder();
            vd($model->columns);
            vd($model->columnsList());*/
        /*Az::$app->cores->chess->generateDataTest();*/
        /*Az::$app->market->element->saveElementsTest();*/
        /*$this->save();*/
        /*$arr = [[1]];
        vdd(ZArrayHelper::arrayLevels($arr));*/
        /*$this->collectNear();*/
        /*Az::$app->market->report->getEnterSum(ShopCatalogWare::findOne(72));*/
        /*vdd(Az::$app->smart->migra->scan());*/
        /*$this->rules();*/
        /*$this->clearOrderItem();*/
        /* $record = ShopCatalogWare::findOne(72);
         vdd(Az::$app->market->report->getEnterSum($record));*/
        /*$this->chess();*/
        /*$this->rules();*/
        /*Az::$app->market->report->getEnterSumTest();*/

        /* $this->region();*/
        /*
                $data = Az::$app->market->reports->getAcceptanceFromCourier();
                vdd($data);*/
        /* $user = User::findOne(419);
         Az::$app->market->operator->callsStatusTime($user);*/
        /*$this->logreports();*/
        /* $this->orderItem();*/
        /*$this->array();*/

        /*vdd(Az::$app->cores->guid->create());*/
        /* $this->query();*/
        /*$this->cloneApp();*/
        /* $a = ShopOrder::find()->andWhere(['deleted_at' => null])->andWhere(['not', ['shop_shipment_id' => null]])->sql();
         vd(App);
         vdd($a);*/
        /*Az::$app->cores->chess->generateDataTest();*/
        /*(new ChessColumnData())->lang();*/
        //$this->countClass();      \

        /*
                Az::$app->language = 'en';
                $res = ZInflector::camel2id('ShopOrder');
                vdd($res);
        */

        /* $model = new ChatMessage();
         $model->text = 'dsf';
         $model->configs->rules = validatorSafe;
         vdd($model->save());*/
        // $this->lanf();

//        $this->countClass();
        /*  $this->nameEx();*/
        /*(new CourierData())->lang();*/
        /*$this->countClass();*/


    }


    public function nameEx()
    {
        $model = new ShopOrder();
        $model->configs->nameOn = [
            'id'
        ];

        $model->configs->nameOff = [
            'name',
            'id'
        ];

        $model->columns();

        $model->name = 'O\'chirish kere';
        $model->save();

    }


    public function lanf()
    {
        $data = [
            'Настройки таблицы' => 'dsafsadf',
            'Настройки таблицы2' => 'dsafsadf',
        ];


        vd($data['Настройки таблицы']);


    }

    public function countClass()
    {
        $class = Report::class;
        $reflection = new \ReflectionClass($class);
        $content = file_get_contents($reflection->getFileName());
        $content = strtr($content, [
            ' ' => ''
        ]);

        $count = 0;
        $lines = explode("\r\n", $content);
        $bool = false;
        $excludes = [
            '{',
            '}',
            ''
        ];

        $isComment = false;
        foreach ($lines as $line) {


            if (ZStringHelper::startsWith($line, 'class')) {
                $bool = true;
                continue;
            }

            if (!$bool)
                continue;

            if (ZArrayHelper::isIn($line, $excludes))
                continue;

            if (ZStringHelper::startsWith($line, '//'))
                continue;

            if (ZStringHelper::startsWith($line, '#region'))
                continue;

            if (ZStringHelper::startsWith($line, '#endregion'))
                continue;

            if (ZStringHelper::endsWith($line, '/*')) {
                $isComment = true;
                continue;
            }

            if (ZStringHelper::startsWith($line, '*/')) {
                $isComment = false;
                continue;
            }

            if ($isComment)
                continue;

            $count++;
        }

        vdd($count);
    }

    public function showValue()
    {
        $model = new SizeForm();
        $model->columns['height']->valueShow = 10;

        $model->height = 5;

        vdd($model->columns['height']);

    }

    public function cloneApp()
    {
        Az::$app->smart->adder->appName = 'mplace';
        Az::$app->smart->adder->theme_dbname = 'db_market_01';
        Az::$app->smart->adder->theme_dbpassword = 'serverpass1234';
        Az::$app->smart->adder->theme_dbUsername = 'postgres';
        Az::$app->smart->adder->createDb();

    }

    public function query()
    {
        $key = 'rols';
        $search = 'admin';
        $query = DynaChess::find()
            ->orWhere("$key @> $search")
            ->all();

        vdd($query);
    }


    public function array()
    {
        $model = WareAccept::find()->asArray()->one();
        vdd($model);
    }

    public function elements()
    {
        $elements = ShopElement::find()->all();
        foreach ($elements as $element)
            $element->save();
    }

    public function catalog()
    {
        $elements = ShopCatalog::find()->all();
        foreach ($elements as $element)
            $element->save();
    }

    public function orderItem()
    {
        $elements = ShopOrderItem::find()->all();
        foreach ($elements as $element)
            $element->save();
    }

    public function logreports()
    {
        Az::$app->market->reports2->dailyReportSKd();
    }

    public function stats()
    {
        $id = 36;
        Az::$app->smart->stats->clear();
        Az::$app->smart->stats->id = $id;
        //Az::$app->smart->stats->dependValues = $depend;
        Az::$app->smart->stats->run();
        $model = Az::$app->smart->stats->createModel();
        // $model->kernel();
        $data = Az::$app->smart->stats->generateData();
        vdd($data);
        $form = Az::$app->smart->stats->generateFilter();
    }

    public function region()
    {
        $regions = PlaceRegion::find()->orderBy('parent_id')->all();
        foreach ($regions as $region)
            $region->save();


    }

    public function order()
    {
        $item = ShopOrderItem::find()
            ->where([
                'shop_order_id' => 1490
            ])->all();

        vdd($item);
    }


    public function chess()
    {
        global $boot;

        $boot->start();
        Az::$app->cores->chess->id = 2;
        Az::$app->cores->chess->run();
        $time = $boot->finish();
        $model = Az::$app->cores->chess->dynamicModel;

        Az::$app->cores->chess->filter = [
            'amount_before' => '10-10-2018',
            'amount_after' => '10-10-2021',
        ];
        $data = Az::$app->cores->chess->data;
        vdd($data[0]);
        $time = $boot->finish();
        //    vdd($time);
        /*vdd($data);*/
    }

    public function clearOrderItem()
    {
        $items = ShopOrderItem::find()->all();
        /** @var ShopOrderItem $item */
        foreach ($items as $item) {
            $order = ShopOrder::findOne($item->shop_order_id);
            if ($order === null) {
                $item->configs->showDeleted = true;
                $item->columns();
                $item->delete();
            }
        }
    }

    public function listview()
    {
        $model = new ShopOrder();

        echo ZListViewWidget::widget([
            'model' => $model,

            'config' => [
                'itemView' => function ($model, $key, $index, $widget) {
                    return ZCardWidget::widget([
                        'model' => $model
                    ]);
                }
            ]
        ]);
    }

    public function rules()
    {
        $model = new PlaceAdress();

        $model->configs->rules = [
            'name' => function ($model) {
                return validatorCaptcha;
            }
        ];

        vdd($model->rules());
    }

    public function collectNear()
    {
        $model = ShopCatalogWare::findOne(56);
        $arr = $model->amount_history;
        $colect = collect($arr);

        $value = $colect->where('date', '<', '2020-09-03 18:29:59')->max()['name'];

        vdd($value);
    }

    public function save()
    {
        $model = new User();
        $model->role = 'user';
        $model->email = 'rf@jnm.d';
        $model->password = '123123';

        $model->modelSave($model);
    }


    public function history()
    {

        $model = ShopOrder::findOne(16);

        $model->status_logistics = $model::status_logistics['new'];
        $model->configs->rules = [
            [validatorSafe]
        ];
        $model->columns();
        $model->save();
    }

    public function relate()
    {


        $item = ShopOrderItem::findOne(505);
        $order = $item->getShopOrderOne();
        $order2 = $item->getShopOrder()->all();
        // vdd($order2);
        //  vd($order2);

        $order3 = $item->getShopOrderItemsWithShopCatalogIdMany();
        $order4 = $item->getShopOrderItemsWithShopCatalogId()->all();
        //  vdd($order4);
        /*vdd($order4);
        vd('');*/
        /** @var ShopOrder $order */
        $order = ShopOrder::findOne(495);
        vdd($order->getUserCompaniesFromUserCompanyIds());


    }

    public function diff()
    {
        $date = Az::$app->cores->date->date();
        $interval = Az::$app->cores->date->date('24hours');
        $diff = Az::$app->cores->date->diff($date, $interval);

        vdd($diff);
    }

    public function getOneTest()
    {
        $model = ShopOrderItem::findOne(495);
        vdd($model->getShopOrderOne());
    }

    public function formTest()
    {
        $d = new TestDilshodForm();
        $d->name = 'wfegdf';
        //  $d->attributes();
        vdd($d->getAttributes());
    }

    public function axror()
    {
        $model = ShopReview::find()
            ->where([
                'user_id' => 4
            ])
            ->orderBy([
                'created_at'
            ])->one();
    }

    public function fixOrderSt()
    {
        $orders = ShopOrder::find()->all();
        foreach ($orders as $order) {
            $val = $order->status_logistics;
            $order->status_logistics = strtr($val, [
                '-' => '_'
            ]);
            $order->save();
        }
    }

    public function orderElements(ShopOrder $model)
    {
        $items = ShopOrderItem::find()
            ->select(['shop_catalog_id'])
            ->where([
                'shop_order_id' => $model->id
            ])
            // ->asArray()
            ->all();

        $elements = [];

        foreach ($items as $item) {
            if (empty($item->shop_catalog_id))
                continue;
            $cat = ShopCatalog::find()
                ->where([
                    'id' => $item->shop_catalog_id
                ])
                ->one();
            if ($cat === null)
                continue;
            // vdd($cat->shop_element_id);
            $elements[] = $cat->shop_element_id;
        }
        //vdd(array_unique($elements));
        return array_unique($elements);

    }

    public function fixOrder()
    {
        $orders = ShopOrder::find()->all();
        foreach ($orders as $order) {
            $order->shop_element_ids = $this->orderElements($order);
            $order->save();
        }
    }

    public function time_of_columns()
    {
        $this->timeBefore('Run');
        $model = new ShopOrder();
        $model->configs->nameOff = [
            'name'
        ];
        $model->columns();
        ZDynaWidget::widget([
            'model' => $model
        ]);
        $this->timeAfter('Run');

        vdd($this->timeGet('Run'));
    }


    private function historyFix()
    {
        $orders = ShopOrder::find()->all();
        foreach ($orders as $order) {
            foreach ($order->columns as $key => $column) {
                $suffixes = ['_lang', '_slug', '_history'];

                //ZStringHelper::endsWith();
                $condition = in_array(substr($key, strrpos($key, "_")), $suffixes);
                if (!$condition)
                    continue;

                $arr = $order->$key;
                $arr_new = [];
                if (is_array($arr))
                    foreach ($arr as $value) {
                        $val_new = [];
                        if (is_array($value))
                            foreach ($value as $attr => $res) {

                            }
                    }
            }
        }
    }

    /**
     *
     * Function  addTime
     * @param $time1
     * @param $time2
     * @return  string
     * @throws \Exception
     * @todo For adding two time variables
     * @author Daho
     */
    public function addTime($time1, $time2)
    {
        $t1 = explode(':', (string)$time1);
        $t2 = explode(':', (string)$time2);

        $secs = (int)ZArrayHelper::getValue($t1, 2) + (int)ZArrayHelper::getValue($t2, 2);
        $minutes = (int)ZArrayHelper::getValue($t1, 1) + (int)ZArrayHelper::getValue($t2, 1) + (int)($secs / 60);
        $secs %= 60;
        $hours = (int)ZArrayHelper::getValue($t1, 0) + (int)ZArrayHelper::getValue($t2, 0) + (int)($minutes / 60);
        $minutes %= 60;

        return $this->numberFormat($hours) . ':' . $this->numberFormat($minutes) . ':' . $this->numberFormat($secs);
    }


    private function numberFormat($number)
    {
        if ($number % 10 === $number)
            $number = "0$number";

        return $number;
    }

    private function clearOrder()
    {

        $orders = ShopOrder::find()->all();
        /** @var ShopOrder[] $orders */
        foreach ($orders as $order) {
            $user = User::findOne($order->user_id);

            if ($user === null) {
                $items = ShopOrderItem::findOne(['shop_order_id' => $order->id]);
                foreach ($items as $item) {
                    $item->delete();
                }

                $order->delete();
            }
        }
    }

}
