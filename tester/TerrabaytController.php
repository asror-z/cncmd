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
//require Root . '/vendori/fileapp/office/vendor/autoload.php';
//require Root . '/vendori/spatie/vendor/autoload.php';

use Amp\Loop;
use Carbon\Carbon;
use Dotenv\Dotenv;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\WebDriverBrowserType;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverKeys;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Reflector;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Shared\OLE\PPS\Root;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Tcpdf;
use Spatie\CollectionMacros\CollectionMacroServiceProvider;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;
use yii\caching\TagDependency;
use yii\web\NotFoundHttpException;
use zetsoft\dbitem\core\WebItem;
use zetsoft\dbitem\core\ServiceItem;
use zetsoft\dbitem\stats\StatsOrderItem;
use zetsoft\former\shop\ShopDailyReportForm;
use zetsoft\models\App\eyuf\db2\Cdr;
use zetsoft\models\App\eyuf\EyufDocument;
use zetsoft\models\App\eyuf\EyufScholar;
use zetsoft\models\dyna\DynaChess;
use zetsoft\models\shop\ShopBrand;
use zetsoft\models\shop\ShopCatalog;
use zetsoft\models\shop\ShopCatalogWare;
use zetsoft\models\shop\ShopCategory;
use zetsoft\models\shop\ShopElement;
use zetsoft\models\shop\ShopOrder;
use zetsoft\models\shop\ShopOrderItem;
use zetsoft\models\shop\ShopProduct;
use zetsoft\models\shop\ShopStatus;
use zetsoft\models\test\TestAsror;
use zetsoft\models\test\TestDep;
use zetsoft\models\test\TestTerrabayt;
use zetsoft\models\user\User;
use zetsoft\models\user\UserCompany;
use zetsoft\models\user\UserContact;
use zetsoft\models\user\UserRbacRest;
use zetsoft\models\ware\Ware;
use zetsoft\models\ware\WareAccept;
use zetsoft\models\ware\WareEnter;
use zetsoft\models\ware\WareEnterItem;
use zetsoft\models\ware\WareExitItem;
use zetsoft\service\auto\Driver;
use zetsoft\service\cores\Auth;
use zetsoft\service\office\ZipArchive;
use zetsoft\service\utility\Menu;
use zetsoft\service\utility\serialize;
use zetsoft\system\actives\ZActiveQuery;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\control\ZSocketIo;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZJsonHelper;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\helpers\ZTest;
use zetsoft\system\helpers\ZVarDumper;
use zetsoft\widgets\navigat\ZDownloadWidget;
use function Amp\Parallel\Worker\enqueueCallable;
use function Amp\Promise\all;
use function Amp\Promise\wait;
use function Dash\includes;
use function foo\func;
use function Spatie\array_keys_exist;

/**
 *
 * @property void $value
 */
class TerrabaytController extends ZControlCmd
{

    public function whereJson()
    {
//        User::find()->where("oauth @> '{\"login\": \"$login\"}'")
//            ->andWhere(['oauth_type' => $service])
//            ->one();
        $value = "admin";
        $value = ZVarDumper::search($value);
//        $rbacs = UserRbacRest::find()
//            ->where("roles @> $value")
//            ->andWhere([
//                'active' => true
//            ])
//            ->all();
//      vdd($value);
        $model = DynaChess::find()->whereJsonIn('rols', 'admin')->all();
        vdd($model);
    }

    public function actionRun()
    {
        Az::$app->cores->tranz->save("ShopOrder|PlaceAdress", '93e1dc1f012aa04718fbc4ee9e14167566fcaffeafb46c6e70b719431b4f53e1');
//        $model = new User();
//        $model->configs->readonly = function ($model){
//             return false;
//        };
//        $model->columns();
//        vdd($model->columns['name']->readonly);
//        $this->paramSet(paramTransact,true);
//        $model = new TestTerrabayt();
//        $model->contact_name = '123123';
//        $model->contact_phone = '1241241';
//        $model->save();

//        vdd(Az::$app->chat->main->getRequestList(91));
/*        $model = new ShopOrder();

        $model->configs->filterOptions = [
            'user_company_ids' => [
                'config' => [
                    'multiple' => false
                ]
            ],

        ];
        $model->columns();*/

     //   $model = ShopOrder::findBySql("SELECT * FROM shop_order WHERE (user_company_ids ?| array['263']) AND ('deleted_at' IS NULL)")->all();
     
//        $model = ShopOrder::findBySql("SELECT * FROM shop_order WHERE jsonb_exists_any(user_company_ids, ARRAY['263'])")->all();
//
//
//        vd($model);
     //   vdd($model->columns['user_company_ids']->filterOptions);


//        $model->configs->ruleOn = [
//            'name'               f
//            'name'               fsentiments
//        ];
//        $model->columns();
//        $model->rules();
//                 vd($model->columns['id']->rules);
//                 vdd($model->configs->rules);
//        vdd($model->columnsList());
//        $model = ShopOrder::find()->whereJsonIn('user_company_ids','263')->count();
//
//
//        vdd($model);
//        $shopOrder = new ShopOrder();
//        $shopOrder->contact_name = 'test';
//        $shopOrder->contact_phone = '998974012297';
//        $shopOrder->save();
//
//        $shopOrderItem = new ShopOrderItem();
//        $shopOrderItem->shop_order_id = $shopOrder->id;
//        $shopOrderItem->user_company_id = 263;

//        $model = new ShopProduct();
//        $model->name = "Redmi note 6 pro1";
//        $model->shop_option_ids = ["486", "468", "469", "458"];
//        $model->autocreate = true;
//        $model->shop_category_id = '101028';
//        $model->save();
////    vdd(Az::$app->chat->main->sendUserInform(91));
//        $array = User::find()->asArray()->all();
//
//        $array = $this->toObject(User::class, $array, true);
//        vdd($array);
//        vd(Az::$app->maps->textToSpeech->test());
        /* $model = new TestTerrabayt();
         $model->configs->rules = validatorSafe;
         $model->contact_name = 'terrabayt';
         $model->save(); */
//        $sock = new ZSocketIo();
//        $sock->run();
//            Az::$app->socket->server->run() ;
//    $user_id = 80;
//        $contacts = UserContact::find()->where(['person' => $user_id])->andWhere(['status' => UserContact::status['accepted']])->asArray()->all();
//        $contacts = Az::$app->chat->main->sendChatList('',91,81);
//        vdd($contacts);
//        vdd($data);
//        $gg = ZActiveQuery::whereJsonInTest();
//        vdd($gg);
//        $gg = ShopOrder::findBySql('SELECT * FROM "shop_order" WHERE ("deleted_at" IS NULL) AND ("shop_shipment_id" IS NOT NULL)')->all();
//    $gg = ShopOrder::find()->andWhere(['deleted_at' => null])->andWhere(['not', ['shop_shipment_id' => null]])->all();
//        vdd($gg);
//        Az::$app->socket->server->run();
//        Az::$app->tests->socketIoNodirbek->run();
//        $model = ShopCatalogWare::findOne(96);
//        $collect = collect($model->amount_history);
//        $gg = $collect->where('date', $collect->max('date'));
//        vdd($gg);
//        $gg = new Carbon();
//        [{"date": "2020-09-21 10:50:25", "name": 543, "user_id": 185}, {"date": "2020-09-22 16:28:19", "name": 977, "user_id": 125}, {"date": "2020-09-23 07:37:23", "name": 777, "user_id": 423}]
//        $this->whereJson();
//        $model = User::find()->whereBetween('created_at','2020-09-15 11:40:56', '2020-09-19 09:06:07')->count();
//        vdd($model);
//        $this->extractCat();
//        $this->generateCategory();
//              0 => "ean13"
//              1 => "itf14"       -
//              2 => "ean128c"      -
//              3 => "ean8"
//              4 => "ean128a"      -
//              5 => "code128a"

//        $string = 'userCompany';
//        vdd();
//        $customers = User::find()->select('user.name,user_company_id,place_region_id')
//            ->with([
//                'userCompany' => function ($query) {
//                    $query->select('id, name');
//                }
//            ])->with('placeRegion')
//            ->where(['user_company_id' =>  2 ])
//            ->limit(100)->cache()->asArray()
//            ->all();

//        foreach ($customers as $customer) {
//          //   no SQL executed
//            $orders = $customer->userCompany;
////            vd($orders->attributes);           with=ModelName|name,title&with=ModelName|name,title
//        }

//        vdd($customers);
//        Return Model
//        $model = User::find()->findFor('PlaceRegion','User');
        //Return random object as array
//        $model = User::find()->asArray()->findFor('PlaceRegion','User');
//        vdd($model);
    }

    public function cleanCrm(){
        $this->dbTruncateTable('shop_order');
        $this->dbTruncateTable('shop_order_item');
        $this->dbTruncateTable('ware_accept');
        $this->dbTruncateTable('ware_enter');
        $this->dbTruncateTable('ware_enter_item');
        $this->dbTruncateTable('ware_exit');
        $this->dbTruncateTable('ware_exit_item');
        $this->dbTruncateTable('ware_return');
        $this->dbTruncateTable('ware_trans');
        $this->dbTruncateTable('ware_trans_item');
    }

    public function collection()
    {
        $array = [
            '123', 'qwe', '321'
        ];
        Collection::make(glob(Root . '/vendori/spatie/vendor/spatie/laravel-collection-macros/src/Macros/*.php'))
            ->mapWithKeys(fn($path) => [$path => pathinfo($path, PATHINFO_FILENAME)])
            ->reject(fn($macro) => Collection::hasMacro($macro))
            ->each(function ($macro, $path) {
                $class = "Spatie\\CollectionMacros\\Macros\\{$macro}";

                $macro = Str::camel($macro);

                if ($macro === 'tryCatch') {
                    $macro = 'try';
                }

                Collection::macro($macro, new $class());
            });


//             vdd(collect($array)->at(1));
        $array = collect($array);
        $gg = $array->at(2);
        vdd($gg);
    }

    public function extractCat()
    {
        $file = file_get_contents(Root . '/upload/genericProducts.json');
        $file = json_decode($file);
        $cat = [];
        foreach ($file as $item) {
            if (!$this->emptyOrNullable($item->category) && !$this->emptyOrNullable($item->sub_category)) {
                $sub_cat = ucfirst(str_replace('  ', ' ', $item->sub_category));
                if (isset($cat[$item->category])) {
                    if (ZArrayHelper::isIn($sub_cat, $cat[$item->category])) {
                        continue;
                    }
                }
                $cat[$item->category][] = $sub_cat;
            }
        }
        $ret = json_encode($cat, JSON_UNESCAPED_UNICODE);
        file_put_contents(Root . '/upload/category.json', $ret);
    }

    public function generateCategory()
    {
        $file = file_get_contents(Root . '/upload/genericProducts.json');
        $file = json_decode($file);
        foreach ($file as $item) {
            if (!$this->emptyOrNullable($item->category) && !$this->emptyOrNullable($item->sub_category)) {
                $shopCat = ShopCategory::findOne(['name' => $item->category]);
                $shopCat1 = ShopCategory::findOne(['name' => $item->sub_category]);
                if ($shopCat === null) {
                    $cat = new ShopCategory();
                    $cat->name = $item->category;
                    $cat->save();
                }
                if ($shopCat1 === null) {
                    $cat = new ShopCategory();
                    $cat->name = $item->sub_category;
                    $cat->save();
                }
            }
        }
    }

    public function addProductAndElement()
    {
        $file = file_get_contents(Root . '/upload/genericProducts.json');
        $file = json_decode($file);
        $array = [];
        $type = [
            "code128a" => 'TYPE_CODE_128_A',
            "ean8" => 'TYPE_EAN_8',
            "ean13" => 'TYPE_EAN_13',

        ];
        foreach ($file as $item) {
            if ($item->type_barcode !== "itf14" && $item->type_barcode !== "ean128c" && $item->type_barcode !== "ean128a") {
                $shopCategory = ShopCategory::findOne(['name' => $item->category]);
                if ($shopCategory) {
                    $shopCategoryOne = ShopCategory::findOne(['name' => $item->sub_category]);
                    if ($shopCategoryOne) {
                        $shopProduct = ShopProduct::findOne(['name' => $item->name]);
                        if ($shopProduct === null) {
                            if (!$this->emptyOrNullable($item->brand)) {
                                $shopProduct = new ShopProduct();
                                $shopProduct->name = $item->name;
                                $brand = new ShopBrand();
                                $brand->name = $item->brand;
                                $brand->save();
                                $shopProduct->shop_brand_id = $brand->id;
                                $shopProduct->shop_category_id = $shopCategoryOne->id;
                                $shopProduct->package = $item->package;
                                $shopProduct->save();
                            } else {
                                $shopProduct = ShopProduct::findOne(['name' => $item->name]);
                                if ($shopProduct) {
                                    $shopProduct = new ShopProduct();
                                    $shopProduct->name = $item->name;
                                    $shopProduct->shop_category_id = $shopCategoryOne->id;
                                    $shopProduct->package = $item->package;
                                    $shopProduct->save();
                                }
                            }
                        }
                    } else {
                        $shopCategoryOne = new ShopCategory();
                        $shopCategoryOne->name = $item->sub_category;
                        $shopCategoryOne->parent_id = $shopCategory->id;
                        $shopCategoryOne->save();
                        $shopProduct = ShopProduct::findOne(['name' => $item->name]);
                        if ($shopProduct) {
                            $shopProduct = new ShopProduct();
                            $shopProduct->name = $item->name;
                            $brand = new ShopBrand();
                            $brand->name = $item->brand;
                            $brand->save();
                            $shopProduct->shop_brand_id = $brand->id;
                            $shopProduct->package = $item->package;
                            $shopProduct->shop_category_id = $shopCategoryOne->id;
                            $shopProduct->save();
                        }
                    }
                } else {
                    $shopCategory = new ShopCategory();
                    $shopCategory->name = $item->category;
                    $shopCategory->save();
                    $shopCategoryOne = ShopCategory::findOne(['name' => $item->sub_category]);
                    if ($shopCategoryOne) {
                        $shopProduct = ShopProduct::findOne(['name' => $item->name]);
                        if ($shopProduct === null) {
                            if (!$this->emptyOrNullable($item->brand)) {
                                $shopProduct = new ShopProduct();
                                $shopProduct->name = $item->name;
                                $brand = new ShopBrand();
                                $brand->name = $item->brand;
                                $brand->save();
                                $shopProduct->shop_brand_id = $brand->id;
                                $shopProduct->shop_category_id = $shopCategoryOne->id;
                                $shopProduct->package = $item->package;
                                $shopProduct->save();
                            } else {
                                $shopProduct = ShopProduct::findOne(['name' => $item->name]);
                                if ($shopProduct) {
                                    $shopProduct = new ShopProduct();
                                    $shopProduct->name = $item->name;
                                    $shopProduct->shop_category_id = $shopCategoryOne->id;
                                    $shopProduct->package = $item->package;
                                    $shopProduct->save();
                                }
                            }
                        }
                    } else {
                        $shopCategoryOne = new ShopCategory();
                        $shopCategoryOne->name = $item->sub_category;
                        $shopCategoryOne->parent_id = $shopCategory->id;
                        $shopCategoryOne->save();
                        $shopProduct = ShopProduct::findOne(['name' => $item->name]);
                        if ($shopProduct) {
                            $shopProduct = new ShopProduct();
                            $shopProduct->name = $item->name;
                            $brand = new ShopBrand();
                            $brand->name = $item->brand;
                            $brand->save();
                            $shopProduct->package = $item->package;
                            $shopProduct->shop_brand_id = $brand->id;
                            $shopProduct->shop_category_id = $shopCategoryOne->id;
                            $shopProduct->save();
                        }
                    }
                }
                $element = ShopElement::findOne(['name' => $item->name]);
                if ($element || $shopProduct === null) {
                    continue;
                }
                $element = new ShopElement();
                $element->name = $item->name;
                $element->barcode = $item->barcode;
                $element->shop_product_id = $shopProduct->id;
                $element->barcode_type = $type[$item->type_barcode];
                $element->save();
            }
        }
    }

    public function jupiter()
    {
        $docxMerge = \Jupitern\Docx\DocxMerge::instance()
            ->addFiles([Root . '/upload/videoz/file1.docx', Root . '/upload/videoz/file2.docx'])
            ->save(Root . '/upload/videoz/res.docx', true);
    }

    public function archive()
    {
        $copyFrom = Root . '/render/cpanet/Main.php';
        $copyTo = Root . '/render/cpazips/1/2/';
        $arch = new \PhpOffice\PhpWord\Shared\ZipArchive();
        $zipFile = new \PhpZip\ZipFile();
        ZFileHelper::createDirectory($copyTo);

        $zipFile
            ->addDirRecursive(Root . '/render/cpanet/New offer/AD/landing1') // add files from the directory
            ->saveAsFile($copyTo . 'test.zip') // save the archive to a file
            ->close();
//         vdd(Az::$app->cpas->cpa->createOfferFolder('terrabayt'));
    }

    //  07.09.2020
    public function statistics()
    {
//        $date = '2020 - 08 - 14';
//        $model = collect(WareEnterItem::findBySql("SELECT * FROM ware_enter_item WHERE created_at::date < '$date';")->all());
//        $result = [];
//        $array = [];
//        foreach ($model as $key => $item) {
//            if (isset($array[$item['shop_element_id']][$item['best_before']])) {
//                $result[$array[$item['shop_element_id']][$item['best_before']]]->before_amount += $item['amount'];
////                if ($item['created_at'] === date('YYYY - m - d')) {
////                    $result[$array[$item['shop_element_id']][$item['best_before']]]->enter_amount += $item['amount'];
////                }
//            } else {
//                $array[$item['shop_element_id']][$item['best_before']] = $key;
//                $form = new ShopDailyReportForm();
//                $form->shop_catalog_id = ShopCatalog::findOne(['shop_element_id' => $item['shop_element_id']])->id;
//                $form->best_before = $item['best_before'];
//                $form->before_amount = $item['amount'];
//                vdd(WareEnterItem::findBySql("SELECT * FROM ware_enter_item WHERE shop_element_id = '{
//        $item['shop_element_id']}' AND best_before = '{
//        $item['best_before']}' AND created_at::date = '$date'")->all());
//                $form->enter_amount = collect(WareEnterItem::findBySql("SELECT * FROM ware_enter_item WHERE shop_element_id = '{
//        $item['shop_element_id']}' AND best_before = '{
//        $item['best_before']}' AND created_at::date = '$date'")->all())->sum('amount');
//                $result[] = $form;
//            }
//        }
//    }
//    public function autoLogin()
//    {
//        $i = new Driver([
//            'headless' => true
//        ]);
//        $login = 'nshaxrizod@mail . ru';
//        $password = '123456';
//        $url = 'http://mplace.mains.uz/';
//
//        $i->openPage($url);
//        echo "The title is '" . $i->getTitle() . "'\n";
//
//        echo "The current URI is '" . $i->getUrl() . "'\n";
//        $i->click('.fa-sign-in-alt');
//        echo "The title is '" . $i->getTitle() . "'\n";
//
//        echo "The current URI is '" . $i->getUrl() . "'\n";
//        $i->fillFieldByName('LoginForm[login]', $login);
//        $i->fillFieldByName('LoginForm[password]', $password);
//
//        $i->submit('#w27');
//        $i->waitTitle('Главная страница');
//
//
//        echo "The title is '" . $i->getTitle() . "'\n";
//        echo "The current URI is '" . $i->getUrl() . "'\n";
//
//        $i->openPage('http://mplace.mains.uz/shop/user/filter-common/main.aspx?id=626');
////        Wait for something
////        $this->driver->wait()->until(
////            WebDriverExpectedCondition::elementTextContains(WebDriverBy::id('loginform-login'), $login)
////        );
//        sleep(10);
//        $i->quit();
    }

    public function wordToPdf()
    {
        $rendererName = Settings::PDF_RENDERER_DOMPDF;
        $rendererLibraryPath = realpath('/../vendor/dompdf/dompdf');
        Settings::setPdfRenderer($rendererName, $rendererLibraryPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererPath(Root . 'vendor\phpoffice\phpspreadsheet\src\PhpSpreadsheet\Writer\Pdf\Tcpdf.php
vendor\phpoffice\phpspreadsheet\src\PhpSpreadsheet\Writer\Pdf\Tcpdf.php');
        \PhpOffice\PhpWord\Settings::setPdfRendererName('TCPDF');
        $phpWord = \PhpOffice\PhpWord\IOFactory::load(Root . '/binary/words/cv/68.docx');

        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'PDF');

        $xmlWriter->save(Root . '/binary/words/cv/68test.docx');
    }

    public function cacheTest()
    {
        TagDependency::invalidate(Az::$app->cache, TestAsror::class);

        $model = Az::$app->cores->cache->setGetTest();
        vdd($model);
        $gg = TestAsror::findOne(8);
        $gg->icon = 'gl gl gl';
        $gg->save();
    }

    public function cdr()
    {
        $model = Cdr::find()
            ->where([
                //$key => $column[$key],
                'src' => 202,
                'dst' => 202,
            ])
            ->orderBy('calldate DESC')
            //->max('calldate');
            //->one();
            ->limit(1)
            ->one();
        //}
        //vdd($model);
//        https://qwerty12.site/VngfrK?keyword={category_id}&cost={click_price}&external_id={click_id}&creative_id={teaser_id}&ad_campaign_id={campaign_id}&source={widget_id}
        $model->userfield = 103;
        $model->save();
    }

    public function parallel()
    {
        $urls = [
            'https://secure.php.net',
            'https://amphp.org',
            'https://github.com',
        ];

        $promises = [];
        foreach ($urls as $url) {
            $promises[$url] = enqueueCallable('file_get_contents', $url);
        }

        $responses = wait(all($promises));
        vdd("ggg");
        foreach ($responses as $url => $response) {
            \printf("Read %d bytes from %s\n", \strlen($response), $url);
        }
    }

    public function createCategory()
    {
        $model = new ShopCategory();
        $model->shop_option_type = '[{"is_combination": "1", "shop_option_type_id": "", "shop_option_branch_id": "4"}]';
    }

    public function insertStatus()
    {
        $array = [
            "Обзвон",
            "Одобрен",
            "Отказ",
            "Не заказывал",
            "Дубль",
            "Некорректный",
            "Выкуп",
            "На исполнении",
            "Новый",
            "Готов к отгрузке",
            "Передан в подотчёт",
            "Отказ во время доставки",
            "Проверка",
            "Перенос дата доставки",
            "Аннулирован",
            "Оплачен частично",
            "Возврат частично",
            "Отменен",
            "Не комплект",
            "К назначению курьера",
            'На комплектации',
            'В ожидании комплектации',
        ];

        foreach ($array as $item) {
            $model = new ShopStatus();
            $model->name = $item;
            $model->save();
        }
    }

    public function fillStatsOrderItem()
    {
        $status = ShopStatus::find()->all();
        $items = [];
        $item = new StatsOrderItem();
        $item->name = Az::l('Все закази');
        $item->count = Az::$app->market->companyStat->orderCountAll(2);
        $items[] = $item;
        foreach ($status as $key => $stats) {
            $item = new StatsOrderItem();
            $item->name = Az::l($stats->name);
            $item->count = Az::$app->market->companyStat->orderByStatusAndCompany($stats->id, 2);
            $items[] = $item;
        }

    }

    public function setValue($items)
    {

    }

    public function getValue()
    {
//        if ($value === null)
//            return false;
//        $var = $value->value;
//        $var = $this->getValue($var);
//        if (ZArrayHelper::getValue($var, 'array'))
//            $data = Az::$app->utility->mains->data2object(ZArrayHelper::getValue($var, 'class'), ZArrayHelper::getValue($var, 'data'));
//        else
//            $data = Az::$app->utility->mains->one2object($var['class'], $var['data']);
//        return $data;
    }

}
