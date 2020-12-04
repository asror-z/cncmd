<?php

namespace zetsoft\cncmd\tester;

/*
 * Sukhrob Nuraliev
 */

require Root . '/vendori/utility/league/vendor/autoload.php';

use zetsoft\models\place\TestPlaceCountry;
use zetsoft\models\shop\ShopCatalogWare;
use zetsoft\service\market\WareAccept;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use yii\db\Query;
use Yii;
use zetsoft\models\ware\WareAccept as WA;

class
LController extends ZControlCmd
{

    public function actionRun()
    {

//        Az::$app->parser->htmlCompress->example();
        Az::$app->optima->tinyHtmlMinifier->example();


//        Az::$app->utility->deepCopy->example();
//        $object = new TestPlaceCountry();
//        Az::$app->utility->deepCopy->copyObject($object);
//        Az::$app->acme->yaac->getssl('mplace.zetsoft.uz', 'www.mplace.zetsoft.uz');
//        Az::$app->acme->acme2->test();

//        $model = new WareAccept();
//        $ware = WA::find()->all();
//        vdd($ware);
//        Az::$app->market->reportAcceptanceData->getVDC($ware);
//        Az::$app->market->reportAcceptanceData2->data();
//        Az::$app->market->reportAcceptanceData2->test('350');
//        Az::$app->market->reportAcceptanceData->getCreateAt($ware);
//        Az::$app->parser->htmlPurifier->example();
//        Az::$app->soaps->Wssecurity->example();
//        Az::$app->maths->mathPhp->example();
//        Az::$app->market->reportNS->data();
//        Az::$app->market->reportNS->test();
//        Az::$app->market->reportNS->getDateDeliver();

//        Az::$app->acme->acmecore->addSSL('market', 'market.zetsoft.uz');
//        Az::$app->acme->acmecore->removeSSL( 'market.zetsoft.uz');
//        Az::$app->acme->acmecore->updateSSL('market.zetsoft.uz', 'market');
//          Az::$app->acme->acme2Suxrob->addSSL('market', 'market.zetsoft.uz');
//            $example = Az::$app->gitapp->gitPhp->example();
//            $example = Az::$app->gitapp->gitelephant->example();

//            $example = Az::$app->gitapp->gitPhp->example();
//            vdd($example);
//        $example = Az::$app->phpdoc->docblock->example();
//        vdd($example);
//        $this->historyShopCatalogWareAmount();
//        $this->random();
    }


    public function fillData()
    {
//        $model = new ShopCatalogWare();

        $query = new Query;

        $datas = $query->select('amount_history')
            ->from('shop_catalog_ware')
            ->all();

        $histories = ShopCatalogWare::find()->select('amount_history')->all();
//        vdd($histories);

        foreach ($datas as $data)
        {
            echo $data;
            $int= rand(1,999999);
            $datetime1 = date("2020-09-21 H:i:s",$int);
            $name = rand(1,1000);
            $user = rand(1,555);

//            ShopCatalogWare::

            // [{"date": "2020-09-03 18:25:59", "name": 10, "user_id": 300}, {"date": "2020-09-03 18:28:59", "name": 8, "user_id": 263}, {"date": "2020-09-03 18:32:38", "name": 6, "user_id": 263}]



            Yii::$app->db->createCommand()
                ->insert('shop_catalog_ware', [
                    'amount_history' => '[{"date": '.$datetime1.', "name": '.$name.', "user_id": '.$user.'}]'
                ])
                ->execute();
        }

//        vdd($datas);

    }

    public function random()
    {
        $int= rand(1,999999);
        $string = date("2020-09-21 H:i:s",$int);
        vdd($string);
    }

    // [{"date": "2020-09-03 18:25:59", "name": 10, "user_id": 300}, {"date": "2020-09-03 18:28:59", "name": 8, "user_id": 263}, {"date": "2020-09-03 18:32:38", "name": 6, "user_id": 263}]

    public function historyShopCatalogWareAmount(){
        $shopCatalogWares = ShopCatalogWare::find()->all();
        /** @var ShopCatalogWare $shopCatalogWare */
        foreach ($shopCatalogWares as $shopCatalogWare){
        $int1= rand(1,999999);
        $int2= rand(1,999999);
        $int3= rand(1,999999);
        $datetime1 = date("2020-09-21 H:i:s",$int1);
        $datetime2 = date("2020-09-22 H:i:s",$int2);
        $datetime3 = date("2020-09-23 H:i:s",$int3);
        $name1 = rand(1,1000);
        $name2 = rand(1,1000);
        $name3 = rand(1,1000);
        $user1 = rand(1,555);
        $user2 = rand(1,555);
        $user3 = rand(1,555);


            $arr = [
                ["date"=> $datetime1, "name" => $name1, "user_id" => $user1],
                ["date"=> $datetime2, "name" => $name2, "user_id" => $user2],
                ["date"=> $datetime3, "name" => $name3, "user_id" => $user3],
            ];

            $shopCatalogWare->amount_history = $arr;
            $shopCatalogWare->save();
        }
    }


}
