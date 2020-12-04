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
use zetsoft\dbdata\ALL\ActionRestData;
use zetsoft\dbitem\App\eyuf\AutoDialItem;
use zetsoft\dbitem\wdg\MenuItem;
use zetsoft\models\App\eyuf\EyufScholar;
use zetsoft\models\dyna\DynaMulti;
use zetsoft\models\place\PlaceCountry;
use zetsoft\models\shop\ShopCatalog;
use zetsoft\models\shop\ShopCategory;
use zetsoft\models\shop\ShopElement;
use zetsoft\models\shop\ShopOrder;
use zetsoft\models\shop\ShopProduct;
use zetsoft\models\ware\WareEnterItem;
use zetsoft\service\cpas\Cpa;
use zetsoft\service\smart\Widget;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\module\Models;

class Test3Controller extends ZControlCmd
{
    /**
     *
     * Function  actionRun
     * @throws \Exception
     */

    public $rename = true;


    public function regex()
    {

        $aa = "
                #bbb{
                    color: bbbbbbbbbbbbbbbbbbbbbb;
                    font-size:16px;
                }
                
                #bbb{
                    bg: oooooooooo;
                    font-weight:500;
                }
                
                #aaaa{
                    color: 5555555555555;
                    font-size:16px;
                }
";

        preg_match_all("/#(.*?){(.*?)}/s", $aa, $match);

        return $match;


    }


    public function getStyle()
    {
        $array = $this->regex();
    }


    public function actionRun()
    {

            
    }

    public function autodial()
    {
        Az::$app->calls->marceAMI->call('171');
    }

    public function testing()
    {

        $number = new AutoDialItem();

        $number->client = '998290234';

        $number->operator = '308';

        $number->order_id = '12';

        $res = Az::$app->calls->marceAMI->originate($number);

        vdd($res);

    }

    public function shahzod()
    {
        $model = ShopOrder::find()
            ->all();

        $arr = [];
        foreach ($model as $item) {
            if (is_array($item->user_company_ids)) {
                foreach ($item->user_company_ids as $user_company_id)
                    $arr[] = (string)$user_company_id;

                $item->user_company_ids = $arr;
            } elseif (is_string($item->user_company_ids))
                $item->user_company_ids = [(string)$item->user_company_ids];

            else
                $item->user_company_ids = [$item->user_company_ids];

            $item->save();
            $arr = [];
        }

    }

    public function qwe()
    {
        //Az::$app->geo->maxmindDb->getIp('128949703');
        /*         Az::$app->office->wordRosha->test();*/
        /*  $aa = new WareExitItem();
          $aa->shop_catalog_id = 1661;
          $aa->amount = 2;
          $aa->ware_exit_id = 21;

          $this->modelSave($aa);*/
        //Az::$app->office->wordRosha->test();
        /* Az::$app->calls->statsMerge->agentWorkedTime();*/
        /*$s = Az::$app->geo->uapPhp->getIp();
         vd($s);*/

//        Az::$app->market->order->renameOrder();
    }

    /**
     *
     * Function  clearElement
     * @author Daho
     */

    public function clearElement()
    {
        $elements = ShopElement::find()->all();
        foreach ($elements as $element) {
            $product = ShopProduct::findOne($element->shop_product_id);
            if ($product === null)
                $element->delete();
        }
    }


//vdd(Az::$app->smart->migra->getAttrsOfModel());

    public function offerCategoriesWithProducts($category_id = null, $status, $company_id = null, $count = 3)
    {

        $offers = $this->shop_offer
            ->where('type', $status)
            ->all();

        $ids = [];
        foreach ($offers as $offer) {
            $ids[] = $offer['shop_catalog_id'];
        }

        if ($company_id == null)
            $catalogs = collect(ShopCatalog::find()
                ->where([
                    'id' => $ids
                ])
                ->asArray()->all());
        else
            $catalogs = collect(ShopCatalog::find()
                ->where([
                    'id' => $ids,
                    'user_company_id' => $company_id
                ])
                ->asArray()->all());

        $elements = $this->shop_elements->whereIn('id', $catalogs->pluck('shop_element_id'));

        $products = $this->shop_products->whereIn('id', $elements->pluck('shop_product_id'));
        // vdd($category_id);
        if ($category_id !== null)
            $products = $products->where('shop_category_id', $category_id);
        // vdd($products);
        $products = $products->take($count)->map(function ($product, $key) {
            $category = ShopCategory::findOne($product->shop_category_id);
            $menuItme = new MenuItem();
            $menuItme->name = $category->name;
            $menuItme->url = "asdfasdf";
            $menuItme->id = $category->id;

            $menuItme->items = Az::$app->market->product->product($product['id']);

            return $menuItme;
        });

        return $products;

        $menuItmes = [];
        foreach ($categories as $category) {
            $menuItme = new MenuItem();
            $menuItme->name = $category['name'];
            $menuItme->url = "asdfasdf";
            $menuItme->id = $category['id'];

            $menuItme->items = $this->productByStatus($category['id'], $status, $count, $company_id)->toArray();

            $menuItmes[] = $menuItme;
        }

        return $menuItmes;

    }

    public function delete()
    {
        Az::$app->search->elasticsearch->index = 'coreproduct';
        Az::$app->search->elasticsearch->deleteIndex();
    }

    public function status()
    {
        /*  Az::$app->market->product1->getAllProductsByCompany('48',null);*/
        // $res =  Az::$app->market->product1->productItemByCatalogId('340');

        $ab = Az::$app->geo->uapPhp->getIp();

        vdd($ab);
    }

    private function azimjon($name = '400 -> 380 between')
    {


        $filters = DynaMulti::find()
            ->where(['name' => $name])
            ->one()->filter;

        $array = [];
        foreach ($filters as $filter) {
            $array = Az::$app->market->filterForm->arrayFilter($filter);
        }

        return $array;
    }

    private function asd()
    {

        $filters = ['value' => "0", "operator" => ">=", "attribute" => "id"];

        $array = [
            'operator' => '',
            'attribute' => '',
            'value' => '',
        ];


        foreach ($filters as $key => $filter) {
            $array[$key] = $filter;
        }


        vdd($array);
    }

    private function menu()
    {
        $class = '\zetsoft\models\ALL\\' . ucfirst(App);
        $modules = $class::lang();

        foreach ($modules as $folder => $title) {
            $path = Root . '\models\\' . $folder . '\\';
            //vdd($path);
            $models = ZFileHelper::scanFiles($path, true);


            foreach ($models as $class) {


                $className = strtr(bname($class), ['.php' => '']);


                $controller = ZInflector::camel2id($className);
                $modelClass = 'zetsoft\\models\\' . $folder . '\\' . $className;
                /** @var Models $model */
                $model = new $modelClass();

                $menuItem = new MenuItem();

                $menuItem = Az::$app->utility->mains->icon();
                $menuItem->title = $model->configs->title;

                $lang = Az::$app->language;
                $menuItem->url = "/$lang/admin/{$controller}.aspx";
                $mapp = ZStringHelper::catModel($className);
                vdd($menuItem);
                if ($model->configs->menu)
                    if ($mapp === 'ALL')
                        $systems[] = $menuItem;
                    else
                        $elements[] = $menuItem;

                Az::debug($model->configs->title, 'Added to Menu');
            }

        };
    }

    private function ravshan()
    {
        $models = PlaceCountry::find()->all();
        foreach ($models as $model) {
            $model->sort = Widget::getCounts(PlaceCountry::class, $model->id);
            $model->save();
        }
    }

}
