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


//require Root . '/ventest/phar/vendor/autoload.php';


use GeoIp2\Database\Reader;
use zetsoft\dbitem\shop\ProductItem;
use zetsoft\dbitem\shop\PropertyItem;
use zetsoft\models\shop\ShopBrand;
use zetsoft\models\shop\ShopCatalog;
use zetsoft\models\shop\ShopCategory;
use zetsoft\models\shop\ShopElement;
use zetsoft\models\shop\ShopOrderItem;
use zetsoft\models\auto\ChatPrivate;
use zetsoft\models\shop\ShopProduct;
use zetsoft\models\shop\ShopReview;
use zetsoft\models\user\User;
use zetsoft\service\market\Product;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\widgets\market\ZCompareJobirWidget;
use zetsoft\widgets\market\ZMenuWidget;

class TestjobirController extends ZControlCmd
{
    public function actionRun()
    {
       /* echo ZMenuWidget::widget([
            'config' => [
                'open' => true,
                'mode' => 'shop',
                'isAll' => true,
            ],
        ]);*/
       // $asd = Az::$app->market->company->getProductByCompanyId(16);
       // vdd($asd);
        // $this->startWatcher('test111');
    //    $a = Az::$app->market->cart->cartOrders(5);
//$a = Az::$app->market->cart->cartOrders(5);
     //   $a = Az::$app->market->filter->testFilterBrands($company_id = null,$brand_id = null);
       //vdd($a);
        //$d = Az::$app->geo->sxGeo->getInfo();
        //$d = Az::$app->geo->ipInfoDb->test();
        //$d = Az::$app->geo->ip2Loacation->test();
        //$d = Az::$app->geo->sypex->test();
        //$d = Az::$app->league->routeSymfony->test_case();
        //$d = Az::$app->league->fractalService->test_case();
        //$d = Az::$app->league->periodService->test_case();
        //$d = Az::$app->league->getGlideService()->test_case();
        //$d = Az::$app->league->csvService->csv_readerTest();
        //$d = Az::$app->office->pandoc->doc_pdf('D:\sm.docx'); //@Dishkan2000
        //$d = Az::$app->league->booboo->test_case();
         //$d = Az::$app->office->wordpdf->test(); //@Dishkan2000
        //$d = Az::$app->mobile->deviceDetection->test_case(); //@Dishkan2000
        //$d = Az::$app->office->mergeFiles->mergeDocsFromArray(array('D:\wysiwig.docx'));//@Dishkan2000
        //$d = Az::$app->office->docto->doc_pdfTest('D:\sm.docx'); //@Dishkan2000
        //$d = Az::$app->office->openOffice->doc_pdf('D:\again.docx'); //@Dishkan2000
        //$d = Az::$app->office->libreoffice->docPdf('D:\wysiwig.docx'); //@Dishkan2000
        //$d = Az::$app->office->officetopdf->docPdf('D:\sm.docx'); //@Dishkan2000
        //$d = Az::$app->office->officeConverter->convert(); //@Dishkan2000
         //$d = Az::$app->office->docto->doc_html('D:\wysiwig.docx'); //@Dishkan2000
        //$d = Az::$app->office->phpWord->test();  //@Dishkan2000
        //$d = Az::$app->market->coupon->test();   //@Dishkan2000
        //$d = Az::$app->market->company->test();  //@Dishkan2000
        //$a = Az::$app->market->product->test();  //@Dishkan2000
        //$a = Az::$app->market->offer->test();
      // $a = Az::$app->market->offerTest->test();
        //$a = Az::$app->market->product->allProductsTest();
        //$a = Az::$app->market->product->allProducts(215, 1, 1, 10, ['price', '-name']);
        /*$a = Az::$app->market->product->allProducts(978, null, null, null);
        vdd($a);*/
       /////temporary commented $reader = new Reader('/geoip2/GeoIP2-City.mmdb');
/////temporary commented
       /////temporary commented $record = $reader->city('128.101.101.101');
/////
       ///// return $record;
       // $a = Az::$app->market->product->allElements(457, 2, 1, 10, ['price', '-name']);
 /*       $a = Az::$app->market->product->allCompanies();
        $a = Az::$app->market->filter->filterFormItems(457);
        $a = Az::$app->market->product->productItemByCatalogId(4);
        $a = Az::$app->market->product->productByStatus(457, ProductItem::statuses['super_offer']);

        $a = Az::$app->market->product->productsIfHasCatalog();
        $a = Az::$app->market->product->product(307, null, true);
        $a = Az::$app->market->product->offerCategoriesWithProducts('super_offer', null, 3);
         $a = Az::$app->market->product->propertsByCategory(457, true, null);
          $a = Az::$app->market->cart->catalogsByElement(308, [6, 1, 15]);
         Az::$app->payer->currency2->fullCurrenyTable();*/
                //  $gg = $this->stopWatcher('test111');
        //$time = $gg->getDuration();
        //     vdd($time);
        // vdd($a);
    }

    public function testAsArray()
    {
        $this->watchStart('test_order');


        $b = Az::$app->market->product->allProducts(null, null, 0, 10);

        $gg = $this->watchStop('test_order');
        $time = $gg->getDuration();

        return $time;
    }


    public function testObject()
    {
        $this->watchStart('test');

        $a = Az::$app->market->productCollection->allProducts(null, null, 0, 100);

        $gg = $this->watchStop('test');
        $time = $gg->getDuration();

        return $time;
    }


    public function del()
    {
        $prod = ShopProduct::deleteAll(['>', 'id', 103]);
    }


    public function query()
    {
        /*$query = \app\models\Admins::find()
            ->select('admin.*,persons.*')  // make sure same column name not there in both table
            ->leftJoin('persons', 'persons.idadm = admins.idadm')
            ->where(['admins.idadm' => 33])
            ->with('persons')
            ->all();
            
        $query = CoreElement::find()
            ->select('shop_element.*,shop_product.*')  // make sure same column name not there in both table
            ->leftJoin('shop_product', 'persons.core_ = shop_element.shop_product_id')
            ->where(['admins.idadm' => 33])
            ->with('persons')
            ->all();*/
    }

    public function productByStatus($category_id, $status)
    {
        $products = collect(ShopProduct::find()->asArray()->all());
        $elements = collect(ShopElement::find()->asArray()->all());
        $catalogs = collect(ShopCatalog::find()->asArray()->all());

        $catalogs = $catalogs->filter(function ($catalog, $key) use ($status) {
            $offer = collect(json_decode($catalog['offer'], true));
            $offer = $offer->where('offer', $status)->filter(function ($item, $key) {
                return strtotime($item['end']) > time();
            });
            if ($offer->count() > 0)
                return true;
        });

        $elements = $elements->whereIn('id', $catalogs->pluck('shop_element_id'));

        $products = $products->whereIn('id', $elements->pluck('shop_product_id'));

        $products = $products->where('shop_category_id', $category_id)->take(3)->map(function ($product, $key) {
            return Az::$app->market->product->product($product['id']);
        });

        return $products;
    }


    public function testtemp()
    {
//        $catalogs = ShopCatalog::findBySql("SELECT *, array_to_json(array_agg(j))
//        FROM core_catalog t, json_array_elements(t.offer) j
//        WHERE j->>'offer' = 'new'
//        ")->all();
        $catalogs = ShopCatalog::find()->where("offer @> '{\"offer\": \"new\"}'")->all();
        vdd($catalogs);
    }

    public function getProductByStatusQuery($category_id, $status)
    {
        $elements = collect(ShopElement::find()->asArray()->all());
        $catalogs = collect(ShopCatalog::find()->asArray()->all());


        $catalogs = $catalogs->filter(function ($catalog, $key) use ($status) {
            $offer = collect(json_decode($catalog['offer'], true));
            $offer = $offer->where('offer', $status)->filter(function ($item, $key) {
                return strtotime($item['end']) > time();
            });
            if ($offer->count() > 0)
                return true;
        });

        $catalogs = ShopCatalog::findBySql("SELECT t.id, array_to_json(array_agg(j))
        FROM your_table t, json_array_elements(t.jsonColumn) j
        WHERE j->>'field' = 'abc'
        GROUP BY id");

        $elements = $elements->whereIn('id', $catalogs->pluck('shop_element_id'));

        //$products = $products->whereIn('id', $elements->pluck('shop_product_id'));
        $products = ShopProduct::find()->where([
            'id' => $elements->pluck('shop_product_id'),
            'shop_category_id' => $category_id
        ])->limit(3);

        $products = collect($products)->map(function ($product, $key) {
            return Az::$app->market->productMerge->product($product['id']);
        });

        return $products;
    }

    public function filter($page, $limit)
    {
        $proItems = [];
        $proItem1 = new PropertyItem();
        $proItem1->items = [1];

        $proItem2 = new PropertyItem();
        $proItem2->items = [10];

        $proItems = [
            $proItem1,
            $proItem2
        ];


        $products = collect(ShopProduct::find()->asArray()->all());


        foreach ($proItems as $proItem) {
            $products = $products->filter(function ($product, $key) use ($proItem) {
                $option_ids = json_decode($product['shop_option_ids'], true);
                //if (in_array(1, $option_ids))
                if (empty($option_ids))
                    return false;
                if (count(array_intersect($proItem->items, $option_ids)) !== 0) {
                    return true;
                } else {
                    return false;
                }
            });
        }

        $products = $products->skip($page * $limit)->take($limit)->map(function ($product, $key) {
            return Az::$app->market->productTerrabayt->product($product['id']);
        });

    }

    public function test11()
    {
        $this->watchStart('test11');

        $products = collect(ShopProduct::find()->all());

        $products = $products->filter(function ($product, $key) {
            if ($product->id > 1)
                return true;
        });

        $gg = $this->watchStop('test11');
        $time = $gg->getDuration();
        vdd($time);
    }
}
