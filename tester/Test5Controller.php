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
use Dotenv\Validator;
use http\Url;
use kartik\dynagrid\DynaGrid;
use kartik\helpers\Enum;
use Opis\Closure\SerializableClosure;
use PHPUnit\Util\Log\JSON;
use Underscore\Types\Arrays;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Sort;
use yii\db\Expression;
use yii\helpers\FileHelper;
use yii\helpers\Html;
use zetsoft\dbcore\ALL\UserCore;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\user\UserCompanyItem;
use zetsoft\former\test\TestLaptopForm;
use zetsoft\former\eyuf\EyufCompletedForm;
use zetsoft\former\eyuf\EyufProgramForm;
use zetsoft\models\App\eyuf\EyufCompatriot;
use zetsoft\models\cpas\CpasStream;
use zetsoft\models\cpas\CpasStreamItem;
use zetsoft\models\cpas\CpasTracker;
use zetsoft\models\shop\ShopCatalogWare;
use zetsoft\models\shop\ShopOrder;
use zetsoft\models\shop\ShopOrderItem;
use zetsoft\models\shop\ShopProduct;
use zetsoft\models\user\UserBlocked;
use zetsoft\models\shop\ShopCatalog;
use zetsoft\models\shop\ShopCategory;
use zetsoft\models\page\PageControl;
use zetsoft\models\place\PlaceCountry;
use zetsoft\models\core\CoreDistrict;
use zetsoft\models\faqs\Faqs;
use zetsoft\models\core\CoreInput;
use zetsoft\models\menu\Menu;
use zetsoft\models\auto\ChatMessage;
use zetsoft\models\page\PageModule;
use zetsoft\models\auto\ChatNotify;
use zetsoft\models\core\CoreRole;
use zetsoft\models\core\CoreSession;
use zetsoft\models\user\User;
use zetsoft\models\App\eyuf\EyufDocument;
use zetsoft\models\App\eyuf\EyufDocumentType;
use zetsoft\models\App\eyuf\DocumentType2;
use zetsoft\models\App\eyuf\Program;
use zetsoft\models\App\eyuf\EyufScholar;
use zetsoft\models\test\Test;
use zetsoft\models\user\UserCompany;
use zetsoft\models\ware\WareAccept;
use zetsoft\models\ware\WareEnter;
use zetsoft\models\ware\WareEnterItem;
use zetsoft\models\ware\WareExit;
use zetsoft\models\ware\WareExitItem;
use zetsoft\models\ware\WareSeries;
use zetsoft\service\App\eyuf\Grape;
use zetsoft\service\cpas\Cpa;
use zetsoft\service\menu\ALL;
use zetsoft\service\menu\ALLNew;
use zetsoft\service\smart\Insert;
use zetsoft\service\utility\UrlApp;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\actives\ZArrayQuery;
use zetsoft\system\assets\ZColor;
use zetsoft\system\assets\ZMenu;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\helpers\ZUrl;
use zetsoft\system\helpers\ZVarDumper;
use zetsoft\system\kernels\ZFrame;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\audios\ZPlayersVideoPlyrWidget;
use zetsoft\widgets\blocks\ZEChartNew2Widget;
use zetsoft\widgets\blocks\ZRefreshWidget;
use zetsoft\widgets\charts\ZChartWidget;
use zetsoft\widgets\dialogs\ZSweetAlert2WidgetOLD;
use zetsoft\widgets\former\ZAjaxWidget;

use zetsoft\widgets\former\ZDynaWidget;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\former\ZListViewWidget;
use zetsoft\widgets\former\ZWizardWidget;
use zetsoft\widgets\images\ZCarouselSlickWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZCheckboxGroupWidget;
use zetsoft\widgets\inputes\ZJqueryFileUploadNewWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\market\ZCategoryListWidget;
use zetsoft\widgets\menus\ZMMmenu3Widget_2;
use zetsoft\widgets\menus\ZMmenuWidget;
use TeamTNT\TNTSearch\TNTSearch;
use zetsoft\widgets\menus\ZMMmenuWidget_;
use zetsoft\widgets\menus\ZMMmenuWidgetMap;
use zetsoft\widgets\menus\ZMMmenuWidgetOLD;
use zetsoft\widgets\menus\ZNavbar3Widget;
use zetsoft\widgets\navigat\ZBreadcrumbsWidget;
use zetsoft\widgets\navigat\ZButtonAjaxWidget;
use zetsoft\widgets\navigat\ZButtonWidget;
use zetsoft\widgets\navigat\ZButtonWidget_2;
use zetsoft\widgets\navigat\ZButtonWidgetAzimjon;
use zetsoft\widgets\navigat\ZMdbCardWidget;
use zetsoft\widgets\themes\ZFriendRequestsWidget;
use zetsoft\widgets\themes\ZMessageWidgetOLD1;
use zetsoft\service\search\manticore\Client;


use yii\helpers\BaseJson;
use function Amp\File\createDefaultDriver;
use function Dash\Curry\find;
use function Dash\where;


class Test5Controller extends ZControlCmd
{
    public function actionRun()
    {

        //vdd($this->urlGetBase());
        //$res = Az::$app->cores->auth->sendForgetEmail('jakh.kudratov@gmail.com');
        /* $res2 = Az::$app->utility->swiftMailerO->sendMail('jakh.kudratov@gmail.com','new');
         vdd($res2);*/
        /*$result = [];
        foreach (EyufScholar::program as $program) {
            $result[] = EyufScholar::find()
                ->where([
                    'user_company_id' => 267,
                    'program' => $program,
                ])
                ->all();
        }

        vd($result[0]->program);*/


        //$this->testBalanceChange_();

        //$res = Az::$app->cpas->cpa->testDeleteAllRelations();

        //vdd($res);

        //$this->deleteStats();

        //$this->testJsonAnd();
        //$this->generateUserId();

        //$this->testChangeStatus();

        /*$model = EyufScholar::findOne(180);
        Az::$app->App->eyuf->scholar->sendNotify($model);*/
        //$this->deleteEmptyWeres();


        //Az::$app->calls->marceAMI->restartAutodial();

        $this->testStatusEyuf();
    }


    public function testStatusEyuf()
    {
        /*$doc = EyufDocument::findOne(140);
        $doc->status = false;
        $doc->save();*/

        $scholar = EyufScholar::findOne(192);
        $scholar->status = 'docReady';
        $scholar->save();
        $test = Az::$app->App->eyuf->scholar->sendNotifyToAdmin($scholar);
         vdd($test);
        /*$res = Az::$app->App->eyuf->docs->status(192);
        vdd($res);*/

    }

    public function deleteEmptyWeres()
    {
        $catalogs = collect(ShopCatalog::find()->all());
        $catalog_weres = ShopCatalogWare::find()->all();
        foreach ($catalog_weres as $were)
        {
            $catalog = $catalogs->where(
                'id', $were->shop_catalog_id
            )->count();
            vd($catalog);
            /*if ($catalog === 0)
            {
                $were->delete();
            }*/

        }
    }

    public function testChangeStatus()
    {
        $res = Az::$app->App->eyuf->docs->testChangeStatus();
        //vdd($res);
    }

    public function generateUserId()
    {
        $tracks = CpasTracker::find()->all();
        foreach ($tracks as $track) {
            $item = CpasStreamItem::findOne($track->cpas_stream_item_id);
            if (!empty($item)) {
                if (!empty($item->user_id)) {
                    $track->user_id = $item->user_id;
                    $track->save();

                }
            }
        }


    }


    public function testBalanceChange()
    {
        $id = 461;
        $track = CpasTracker::findOne($id);
        $track->status = CpasTracker::status['new'];
        $track->save();
    }

    public function testBalanceChange_()
    {
        $id = 462;
        $track = CpasTracker::findOne($id);
        $track->status = CpasTracker::status['accept'];
        $track->save();
        //$res1 = Az::$app->cpas->cpa->setBalance($track);
        //$res = Az::$app->cpas->cpa->balance($track, 'minus');
        //vdd($track);
    }

    private function azimjon()
    {
        $scholar = EyufCompatriot::find()->all();
        vdd($scholar);
        //Az::$app->App->eyuf->docs->getDocList();
    }

    public function testJsonAnd()
    {
        $array = ['264', '266'];
        $array = 'array' . json_encode($array);
        $expression = new \yii\db\Expression("$array");
        //vd($array);
        //vdd($expression);

        /*$test = ShopOrder::find()
            ->where("user_company_ids ?| $expression")
            ->all();*/

        $test2 = ShopOrder::find()
            ->where([
                '?&', 'user_company_ids', $expression
            ])
            ->all();


        /**
         * new Expression("?|"),
         * "guest_users",
         * new Expression("array['".$user_name."']")
         */
        /* $test3 = ShopOrder::find()
             ->where(new Expression("user_company_ids::jsonb ?| $expression"))
             ->all();*/

        /*$test4 = ShopOrder::find()
            ->where([new Expression("\?&"),
                "user_company_ids",
                $expression])
            ->all();*/
        /*
                $test5 = ShopOrder::find()
                    ->where("jsonb_exists_all('user_company_ids'::jsonb, $expression)")
                    ->all();*/

        vdd($test2);

    }

    public function whereJsonAndIn(string $column, $value)
    {

        $data = false;

        if (is_array($value) && !empty($value)) {
            $value = 'array' . json_encode($value);
            $value = new \yii\db\Expression("$value");
            $data = $this->andWhere("$column ?& $value");
        }
        return $data;

    }

    public function whereJsonOrIn(string $column, $value)
    {

        $data = false;

        if (is_array($value) && !empty($value)) {
            $value = 'array' . json_encode($value);
            $value = new \yii\db\Expression("$value");
            $data = $this->andWhere("$column ?| $value");
        }
        return $data;

    }

    public function checkUserAll()
    {
        $user = User::findOne(315);
        vdd(md5($user->password));
    }

    public function deleteStats()
    {

        $user_id = 357;

        $user_balance = User::findOne(357);
        $user_balance->balance = null;
        $user_balance->save();


        $items = CpasStreamItem::find()
            ->where([
                'user_id' => 357
            ])->all();

        $ids = ZArrayHelper::map($items, 'id', 'id');

        $traks = CpasTracker::find()
            ->where([
                'cpas_stream_item_id' => $ids
            ])->all();

        //vdd(count($traks));

        foreach ($traks as $trak) {
            $trak->delete();
        }
    }

    public function testCreate()
    {
        $ids = [
            0 => 98,
            1 => 100,
            2 => 102,
        ];

        $user_id = 350;
        $test = Az::$app->cpas->cpa->createStreamItem($ids, $user_id);
        vdd($test);
    }


    public function testEditDirectory()
    {
        $model = CpasStream::findOne(134);

        Az::$app->cpas->cpa->editStream($model, 350);
    }

    public function testPixel()
    {
        $streams = CpasStream::find()->all();
        foreach ($streams as $stream) {
            vd($stream->id);
            vd($stream->counter['facebook']);
        }
    }

    public function testTlight()
    {
        $res = Az::$app->cpas->cpasLead->postbackTlightBalance();
        vdd($res);

    }

    public function testStatus()
    {
        $model = new ShopOrder();
        $model->configs->query = ShopOrder::findOne(2178);;
        //vdd($model->attributes);
        $res = Az::$app->market->order->sendStatusToCpa($model);
        vdd($res);
    }


    public function getDeviceOs()
    {
        $os = Az::$app->geo->geodecoder->getOs('Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1');
        vdd($os);
    }


    public function login()
    {

    }


    public function create()
    {


    }


    /**
     *
     * Function  actionRun
     * @throws \Exception
     */

    public function addNumbers()
    {
        $aaa = ShopOrder::find()->all();

        foreach ($aaa as $aa) {
            $aa->number = $aa->id;
            $aa->configs->rules = [
                [
                    validatorSafe
                ]
            ];
            $aa->save();
        }
    }


    public function createWareExit($shop_order_id)
    {

        $shop_order_items = ShopOrderItem::find()
            ->where([
                'shop_order_id' => $shop_order_id
            ])
            ->all();

        /** @var ShopOrderItem $shop_order_item */

        foreach ($shop_order_items as $shop_order_item) {

            $shop_catalog_id = $shop_order_item->shop_catalog_id;
            $ware_id = $shop_order_item->ware_id;
            $user_company_id = $shop_order_item->user_company_id;

            $ware_exit = new WareExit();
            $ware_exit->ware_id = $ware_id;
            $ware_exit->user_company_id = $user_company_id;
            $ware_exit->date = Az::$app->cores->date->date();

            $ware_exit->save();

            $shop_catalog_ware = ShopCatalogWare::findOne([
                'ware_id' => $ware_id,
                'shop_catalog_id' => $shop_catalog_id
            ]);

            if (!$shop_catalog_ware) {
                return false;
            }

            $ware_exit_item = new WareExitItem();
            $ware_exit_item->ware_exit_id = $ware_exit->id;
            $ware_exit_item->shop_catalog_id = $shop_catalog_id;
            $ware_exit_item->shop_catalog_ware_id = $shop_catalog_ware->id;
            $ware_exit_item->amount = $shop_order_item->amount;

            $ware_exit_item->save();
        }
    }

    public function createWareEnter()
    {

        $shop_order_id = 560;

        $shop_order_items = ShopOrderItem::find()
            ->where([
                'shop_order_id' => $shop_order_id
            ])
            ->all();

        /** @var ShopOrderItem $shop_order_item */

        foreach ($shop_order_items as $shop_order_item) {

            $shop_catalog_id = $shop_order_item->shop_catalog_id;
            $ware_id = $shop_order_item->ware_id;
            $user_company_id = $shop_order_item->user_company_id;

            $ware_enter = new WareEnter();
            $ware_enter->ware_id = $ware_id;
            $ware_enter->user_company_id = $user_company_id;
            $ware_enter->date = Az::$app->cores->date->date();

            $ware_enter->save();

            $shop_catalog = ShopCatalog::findOne($shop_catalog_id);

            if (!$shop_catalog) {
                return false;
            }

            $shop_catalog_ware = ShopCatalogWare::findOne([
                'ware_id' => $ware_id,
                'shop_catalog_id' => $shop_catalog_id
            ]);

            if (!$shop_catalog_ware) {

                $shop_catalog_ware = new ShopCatalogWare();
                $shop_catalog_ware->ware_id = $ware_id;
                $shop_catalog_ware->shop_catalog_id = $shop_catalog_id;
                $shop_catalog_ware->amount = $shop_order_item->amount_partial;
                $shop_catalog_ware->price = $shop_catalog->price;

                $shop_catalog_ware->save();

            }

            $ware_enter_item = new WareEnterItem();
            $ware_enter_item->ware_enter_id = $ware_enter->id;
            $ware_enter_item->shop_element_id = $shop_catalog->shop_element_id;
            $ware_enter_item->shop_catalog_ware_id = $shop_catalog_ware->id;
            $ware_enter_item->amount = $shop_order_item->amount;

            $ware_enter_item->save();

        }
    }

    public function dd()
    {
        $companies = UserCompany::findAll(133);
        $companyItemArray = [];
        $baseUrl = $this->urlGetBase();
        $url = '/upload/imagez/mplace';
        /** @var UserCompany $company */
        foreach ($companies as $company) {
            vdd($company['photo'][0]);
            $companyItem = new UserCompanyItem();
            $companyItem->photo = $company['photo'][0];

            $companyItemArray[] = $companyItem;
        }

        return $companyItemArray;
    }


    public function test()
    {
    }


    public function globalMethods()
    {

        $methods = Az::$app->utility->pregs->refMethodList(ZFrame::class);
        $return = [];
        foreach ($methods as $method) {
            $return[] = $method->name;
        }

        return $return;
    }


    public function saveEnter()
    {

        $model = new WareEnterItem();

        $model->shop_element_id = 584944;
        $model->amount = 40;
        $model->price = 1000;
        $model->ware_enter_id = 134;
        $model->configs->rules = [
            [
                validatorSafe
            ]
        ];

        $model->save();
    }


    private function ravshan()
    {
        $methods = Az::$app->utility->pregs->refMethodList(Grape::class);
        $globalMethods = $this->globalMethods();

        $return = [];
        foreach ($methods as $method) {
            if (!ZArrayHelper::isIn($method->name, $globalMethods))
                $return[] = $method->name;
        }

        return $return;
    }

    public function bobur()
    {

        /*Az::$app->search->getSphinxService()->name = 'test5';
        Az::$app->search->getSphinxService()->search = 'BironIsm';
        Az::$app->search->getSphinxService()->chooseModal();
        Az::$app->search->getSphinxService()->search();*/

        /*Az::$app->search->getSphinxService()->name = 'test3';
        Az::$app->search->getSphinxService()->chooseModal();
        Az::$app->search->getSphinxService()->newIndex();*/

        /*Az::$app->search->getSphinxService()->name = 'User';
        Az::$app->search->getSphinxService()->chooseModal();
        Az::$app->search->getSphinxService()->writeRt();*/

        /*Az::$app->search->getSphinxService()->name = 'test5';
        Az::$app->search->getSphinxService()->chooseModal();
        Az::$app->search->getSphinxService()->writeRt();*/


//        $con = Az::$app->search->getSphinxClient();
//        $con->setServer('127.0.0.1', 9312);
//        $res = $con->Query('Наумов', 'test5Rt');
//        var_dump($res);


//        $modal = new Test5;
//        $modal->first_name = 'SomeName1';
//        $modal->second_name = 'SomeLastName1';
//        $modal->email = 'Email@email.email';
//        $modal->save();

//        $modal = Test5::findOne(3028);
//        $modal->delete();


//        Az::$app->search->getSphinxService()->name = 'test5';
//        Az::$app->search->getSphinxService()->search = 'SomeName1';
//        Az::$app->search->getSphinxService()->vals = ['id' => 8888, 'first_name' => 'newValue', 'second_name' => 'Komilov', 'email'=> 'Email@email.email', 'smthElse' => 'smthElse'];
//        Az::$app->search->getSphinxService()->search();


        Az::$app->search->getSphinxService()->name = 'test5';
        Az::$app->search->getSphinxService()->newIndex();

        /*Az::$app->search->getSphinxService()->name = 'test5';
        Az::$app->search->getSphinxService()->updateIndex();*/

    }

    public function deleteIndex()
    {
        Az::$app->search->getTntSearchService()->name = 'Test5';
        Az::$app->search->getTntSearchService()->deleteIndex();
    }

    public function getAll()
    {
        $tables = Az::$app->db->schema->getTableSchema('core_control')->getColumnNames();
        foreach ($tables as $table) {
            echo $table . PHP_EOL;
        }
    }

    public function apcu()
    {
        $bar = 'BAR';
        apcu_store('foo', $bar);
        var_dump(apcu_fetch('foo'));
    }


    public function product()
    {
        vdd(Az::$app->market->product->product(8));
    }

    public function getAge($birthdate)
    {
        $year = date('Y');
    }

    public function getDocListHTM()
    {


        $list = $this->getDocList();

        $htm = '<h5>Необходимые документы для рассмотрения вашей заявки:</h5> <ol>';
        foreach ($list as $item) {
            if ($item['document'] === null)
                $htm .= '<li>' . $item['type']->name . '</li>';
        }
        $htm .= '</ol><br><h5>Просим предоставить эти документы.</h5>';
        return $htm;
    }

    private function makeDocumentList($scholar, $doctypes)
    {
        $return = [];
        $documents = EyufDocument::findAll([
            'eyuf_scholar_id' => $scholar->id,
        ]);
        foreach ($doctypes as $type) {
            $res = [
                'type' => $type,
                'document' => null
            ];
            foreach ($documents as $doc) {
                if ($doc->eyuf_document_type_id === $type->id)
                    $res['document'] = $doc;
            }
            $return[] = $res;
        }
        return $return;
    }

    private function getDocumentTypes($scholar)
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

    public function dilshod2()
    {
        vdd(Az::$app->App->eyuf->getDocs()->getEmptyColumnsHTM());
    }

    public function testservice()
    {
        vdd(Az::$app->App->eyuf->getWord()->getEmptyColumnsHTM());
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
        vdd(12);

    }

    private function map()
    {

        echo ZMMmenuWidgetMap::widget([
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

        $app2->cards = [];

        $model2 = Az::$app->forms->former->model($app2);

        echo '';
//        $this->testdata();
//        $this->testAjax2();
//        $this->testBtn();
//        $this->wd();
    }


}



