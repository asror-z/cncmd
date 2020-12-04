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
use Symfony\Component\Finder\Finder;
use yii\sphinx\Query;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\FormDb;
use zetsoft\models\page\PageControl;
use zetsoft\models\place\PlaceCountry;
use zetsoft\models\shop\ShopCatalog;
use zetsoft\models\shop\ShopOrder;
use zetsoft\models\shop\ShopOrderItem;
use zetsoft\models\App\eyuf\EyufScholar;
use zetsoft\models\mplace\Offer;
use zetsoft\models\ware\WareAccept;
use zetsoft\service\image\InterventionImage;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\former\ZListViewWidgetOld;
use zetsoft\widgets\market\ZMenuWidget;

class Test9Controller extends ZControlCmd
{


    public function activeRun()
    {
      //   Az::$app->office->wordpdf->test();
        //   Az::$app->servise->office->banderolTest();
         // vdd(Az::$app->market->operator->agentStatusChange(110,'online'));

    }

    public function testInfin(){
        for($i = 0; $i < 4; $i++ ){
            $a = Az::$app->market->product->allElements(457, 1, $i, 5);
        }
    }

    public function testSchedule()
    {
//    vdd(date('Y-m-d H:i:s'));
        $this->watchStart("hh");
        $a = Az::$app->market->offer->getOffersWithStatus('new', date('Y-m-d H:i:s'), '>=');
        $gg = $this->watchStop('hh');
        vdd($a);

    }

    public function testMenuWidget()
    {
        echo ZMenuWidget::widget([
            'config' => [
                'open' => true,
                'mode' => 'shop'
            ]
        ]);
    }

    public function testBrandItem(){
       $brandList =  Az::$app->market->brand->brandList();
        vdd($brandList);
    }

    public function testCurrency(){
        $currency = Az::$app->payer->currency2->fullCurrenyTable();
    }
    public function actionRun()
    {
        /*Az::$app->smart->migra->baseModels();*/
        //Az::$app->auto->FpbxExtsI->config();
       // Az::$app->auto->FpbxExtsI->autoLogin();
       // Az::$app->auto->FpbxExtsI->createExtension();
        Az::$app->auto->FpbxExtsI->editExtension();

        /*$model = new WareAccept();
        vdd(Az::$app->market->wares->wareAcceptCalculate($model));*/
         //$this->testInfin();
         //  $this->link();
           // $this->testSchedule();
//        $this->testMenuWidget();
        //$this->testSchedule();
//        $this->testCurrency();

//        $model = ShopOrderItem::findBySql('SELECT * FROM core_order_item ci INNER JOIN shop_order co ON ci.shop_order_id=co.id')->all();
//        vdd($model);

        // $this->link();
        //  Az::$app->smart->fake->model();
        //$a =Az::$app->search->search->
        //$this->sphin();
        /*
                echo \zetsoft\widgets\market\ZDilshodBoxWidget::widget([
                    //'model' => $model,
                    'model' => Az::$app->market->product->allProducts($this->httpGET('id')),
                    'config' => [
                        'widget' => zetsoft\widgets\market\ZProductCardWidget::class,
                    ]
                ]);


                // vdd(Az::$app->socket->chat->getData());
            }

            public function sphin()  {
                $connection = new \yii\db\Connection([
                    'dsn' => 'pgsql:host=10.10.3.207;port=5432;',
                    'username' => 'postgres',
                    'password' => 'serverpass1234',
        ]);
                $connection->open();
                $command = $connection->createCommand("SELECT * FROM db28 WHERE MATCH('programming')");
                $articles = $command->queryAll();
                $command = $connection->createCommand('UPDATE idx_article SET status=2 WHERE id=1');
                $command->execute();
                // Создадим объект - клиент сфинкса и подключимся к нашей службе
               /* $cl = new  Query();
                //$cl->SetServer("localhost", 9312);

        // Собственно поиск
                // $cl->SetMatchMode(SPH_MATCH_ANY); // ищем хотя бы 1 слово из поисковой фразы
                $result = $cl->from('user_company')->match("computer")->all(); // поисковый запрос

        // обработка результатов запроса
                if ($result === false)
                {
                    echo "Query failed: "; //. $cl->GetLastError() . ".\n"; // выводим ошибку если произошла
                }

                else {
                    if ($cl->GetLastWarning()) {
                        echo "WARNING: " ;//. $cl->GetLastWarning() . " // выводим предупреждение если оно было    ";
                    }

                    if (!empty($result["matches"])) { // если есть результаты поиска - обрабатываем их
                        foreach ($result["matches"] as $product => $info) {
                            echo $product . "<br />"; // просто выводим id найденных товаров
                        }
                    }
                }   */

        //  exit;
    }

}

