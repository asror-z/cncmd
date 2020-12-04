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

use yii\data\Sort;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\map\DistanceItem;
use zetsoft\former\shop\ShopCompanyCardForm;
use zetsoft\models\place\PlaceAdress;
use zetsoft\models\user\ChatGroup;
use zetsoft\models\shop\ShopProduct;
use zetsoft\models\user\UserBlocked;
use zetsoft\models\core\CoreCategoryOne;
use zetsoft\models\core\CoreTestCopy;
use zetsoft\models\user\User;
use zetsoft\service\forms\Ajaxer;
use zetsoft\service\market\ProductJaxongir;
use zetsoft\service\smart\FakeJaxongir;
use zetsoft\system\actives\ZActiveData;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\former\ZFormWizardWidget;
use zetsoft\dbitem\stats\AnalyticStatusItem;
use zetsoft\former\shop\ShopOrderForm;
class TestjaxonController extends ZControlCmd
{
    public function actionRun()
    {

        vdd($product = Az::$app->market->product->product(41, null, true));
        $model = new ShopOrderForm();
        $model->user_id = 777;
        $model->contact_name = 'Jtscorp';
        //$model->place_adress_id=17;
        $model->contact_phone ='77-777-77';
        $model->comment_user ='';
        $model->payment_type ='cash';
        $form=(array)$model;
        $result=Az::$app->market->order->saveOrders($form);
         vdd($result);
        vdd(Az::$app->market->cart->getcatalogsByElement(2, [1, 5]));
        vdd(Az::$app->market->product->product(2, null, true));
        vdd(Az::$app->market->order->getOrderListTest());


        $table = "shop_option";
        $table1 = "shop_offer";
        $table2 = "shop_option_branch";
        $table3 = "shop_element";

        $command = Az::$app->db->createCommand('TRUNCATE TABLE "' . $table . '" RESTART IDENTITY')->execute();
        Az::$app->db->createCommand('TRUNCATE TABLE "' . $table1 . '" RESTART IDENTITY')->execute();
        Az::$app->db->createCommand('TRUNCATE TABLE "' . $table2 . '" RESTART IDENTITY')->execute();
        Az::$app->db->createCommand('TRUNCATE TABLE "' . $table3 . '" RESTART IDENTITY')->execute();

        vdd($command);
        vdd(Az::$app->market->adminStatistic->adminexpence("2020-06-23 ", "2020-06-24 12:38"));
        vdd(Az::$app->utility->dbclear->dbitem());
        vdd(Az::$app->market->product->product(999, null, true));

        vdd(Az::$app->market->adminStatistic->AdminInfo());

        vdd(Az::$app->market->order->getInfoOrder(17));
        vdd(Az::$app->market->category->getMenuItem(705));


        $companyItem = new ShopCompanyCardForm();
        $companyItem->price_old = 10000.0;
        $companyItem->new_price = 8560.0;

        if ($companyItem->price_old > $companyItem->new_price) {
            echo round(($companyItem->price_old - $companyItem->new_price) / $companyItem->price_old * 100);

        }
        vdd();
        $product = Az::$app->market->product->allProducts(215, 1, 1, 10, ['price', '-name']);

        foreach ($product as $w) vd($w);

        $dist = Az::$app->maps->distance->deliverPrice(6, 1);
        vdd($dist);
        $dist = Az::$app->maps->distance->cores(5, 6);

        vdd($dist);
        Az::$app->smart->fake->model();
        vdd('jj');
        vd(Az::$app->maps->maps->testtwo());

        //Az::$app->asteriskk->reactAmiF_Jamoliddin->originate();
        Az::$app->asteriskk->reactAmiF_Jamoliddin->limit(['202', '203', '204', '205'], 2);


        $dist = Az::$app->maps->map->multicore(1, [4, 3, 2]);
        $this->formattedAddrFrom = '41.3397711,69.285317';
        $this->formattedAddrTo = '41.3386112,69.339047';
        vdd($this->core(38, 39, 5400));
        vd($dist->distance_in_meter);
        vd($dist->time);
        echo Az::$app->maps->map->getprice(2, 3, 50);

        // vdd(Az::$app->smart->direct->test());
        vdd();
        $a = new ZActiveData([
            'query' => User::find(),
            /*'totalCount'=>$this->totalCount,
            'count'=> $this->count,*/
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC,
                ]],
            'pagination' => [
                'pageSize' => 1,
            ]
        ]);
        vdd($a->getModels());
        Az::$app->search->activeData->query = ShopProduct::find();
        Az::$app->search->activeData->pagination = [
            'pageSize' => 10,
        ];
        Az::$app->search->activeData->sort = new Sort([
            'attributes' => [
                'name',
                'price'
                // or any other attribute
            ],

        ]);

        $all = Az::$app->search->activeData->run2();
        vdd(Az::$app->search->activeData->provider);
        // vdd(array_column(CoreGroup::find()->select(['id'])->indexBy('id') ->asArray()->all(),'id'));
        Az::$app->smart->fakeJaxongir->model();
        Az::$app->search->manticore->indexName = 'testuser';
        Az::$app->search->manticore->query = 'Interstell*';
        Az::$app->search->manticore->fields = 'title';
        Az::$app->search->manticore->id = 1;
        Az::$app->search->manticore->document =
            ["email" => "shokirjonov@gmail.com",
                "name" => "client",
                "role" => "null",
                "phone" => "null",
            ];
        //vdd(User::find()->select('id')->asArray()->all());

        $option = [
            // 'dict' => 'keyword',
            'morphology' => 'stem_enru,Soundex, Metaphone',
            'min_infix_len' => 2,
            'min_word_len' => 2,
            'min_prefix_len' => 2,
            'expand_keywords' => 1,
            'index_exact_words' => 1,
            'enable_star' => 1,
            //'regexp_filter ' =>"^\d\w+",
        ];
        Az::$app->search->manticore->documents = [
            ['id' => 2, 'title' => 'Interstellar', 'plot' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.', 'year' => 2014, 'rating' => 8.5],
            ['id' => 3, 'title' => 'Inception', 'plot' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', 'year' => 2010, 'rating' => 8.8],
            ['id' => 4, 'title' => '1917 ', 'plot' => ' As a regiment assembles to wage war deep in enemy territory, two soldiers are assigned to race against time and deliver a message that will stop 1,600 men from walking straight into a deadly trap.', 'year' => 2018, 'rating' => 8.4],
            ['id' => 5, 'title' => 'Alien', 'plot' => ' After a space merchant vessel receives an unknown transmission as a distress call, one of the team\'s member is attacked by a mysterious life form and they soon realize that its life cycle has merely begun.', 'year' => 1979, 'rating' => 8.4]
        ];

        // User::find()->select(['id', 'name', 'email', 'phone'])->asArray()->all();
        //vdd(Az::$app->search->manticore->documents);

        Az::$app->search->manticore->drop();
        Az::$app->search->manticore->create([
            'title' => ['type' => 'text'],
            'plot' => ['type' => 'text'],
            'year' => ['type' => 'integer'],
            'rating' => ['type' => 'float']
        ], $option);

        /* create([
             'email' => ['type' => 'text'],
             'name' => ['type' => 'text'],
             'role' => ['type' => 'string'],
             'phone' => ['type' => 'string']
         ], $option);*/

        // Az::$app->search->manticore->addDocuments();

        //vdd(Az::$app->search->manticore->match());

        vdd(Az::$app->search->manticore->match());
        //vdd(Az::$app->search->manticore->searching());

        // Az::$app->market->order2Jaxon->test();
        //Az::$app->market->order->getProductBelongsToOrder(15);

        //Az::$app->smart->fakeJaxongir->model();
//        Az::$app->forms->former->clean();
//        Az::$app->forms->former->model = new CoreBlocked();
//        Az::$app->forms->former->isCnt = false;
//        Az::$app->forms->former->ident = 0;
//        Az::$app->forms->former->readonly = false;
//        Az::$app->forms->former->type = ZFormWidget::type['block'];


//        Az::$app->forms->former->run();
        /*  ZFormWizardWidget::widget([
              'model' => new CoreBlocked()
          ]);
  //        Az::$app->socket->phpiosocket_3->run();

      }


      public function cat()
      {


          $mains = CoreCategoryOne::find()
              ->where([
                  'child' => []
              ])
              ->all();


          /*
                  $childs = CoreCategoryOne::find()
                      ->where([
                          'id' => $category->child
                      ])
                      ->all();*/


//        vd($mains);

    }


    public function test()
    {
        $dirs = ZFileHelper::scanFolder(Root . '/control', true);
        vdd($dirs);
    }

}
