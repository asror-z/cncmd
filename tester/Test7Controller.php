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

use Closure;
use ParseCsv\Csv;
use zetsoft\cnweb\ALL\admin\PageActionController;
use zetsoft\models\page\PageAction;
use zetsoft\models\place\PlaceCountry;
use zetsoft\models\auto\ChatMessage;
use zetsoft\models\user\User;
use zetsoft\models\App\eyuf\EyufScholar;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\widgets\chates\ZChatUsersLIst;

class Test7Controller extends ZControlCmd
{

    public function actionRun()
    {
      //vdd(Az::$app->market->operator->setOrdersToAgent('099', '["3","5","4","7","8","9","10","11","12"]'));

      // Az::$app->cores->buildPageB->actionScans();
      //Az::$app->office->word2->generateRouteSheet(213);

      //Az::$app->market->productumid->ProductTest();
    }
    public function ulugbek()
    {
        Az::$app->search->activeData->query = User::find();
        Az::$app->search->activeData->pagination = [
            // The default page size.
            'defaultPageSize' => 2,
            // Whether to always have the page parameter in the URL created by createUrl().
            'forcePageParam' => false,
            // The zero-based current page number.
            'page' => 5,
            // Number of pages
            //'pageCount' => 2,
            // Name of the parameter storing the current page index.
            'pageParam' => 'page',
            // The number of items per page.
            'pageSize' => 2,
            //
        ];
        //Az::$app->search->activeData->sort = [];
        $all = Az::$app->search->activeData->run2();
        vdd($all);
    }
    public function ulugbek1()
    {
        Az::$app->search->activeData->query = User::find();
        Az::$app->search->activeData->pagination = [
            //'limit' => 5,
            //'offset' => 5,
            //'pageCount' => 1,
            //'offset' => 2,
            //'pageSize' => 10,
            'pageSizeLimit' => [2, 20],
        ];
        //Az::$app->search->activeData->sort = [];
        $all = Az::$app->search->activeData->run2();
        vdd($all);
    }

    public function bobur()
    {
//        Az::$app->search->getTntSearchService()->name = 'CoreProduct';
//        Az::$app->search->getTntSearchService()->id = 123;
//        Az::$app->search->getTntSearchService()->data = ['id'=> 455555, 'name'=>'Menumenu'];
//        Az::$app->search->getTntSearchService()->addDocToIndex();
//        Az::$app->search->getTntSearchService()->updateDocInIndex();

        Az::$app->search->getTntSearchService()->testCreateIndexService();
//        Az::$app->search->getTntSearchService()->testDeleteIndex();
//        Az::$app->search->getTntSearchService()->testAddDocToIndex();
//        Az::$app->search->getTntSearchService()->testUpdateDocInIndex();
//        Az::$app->search->getTntSearchService()->testDeleteDocFromIndex();


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


//        Az::$app->search->getSphinxService()->name = 'CoreProduct';
//        Az::$app->search->getSphinxService()->writeRt();
//        Az::$app->search->getSphinxService()->search = 'ruchka';
//        Az::$app->search->getSphinxService()->search1();
//        var_dump(Az::$app->search->getSphinxService()->result);

        /*Az::$app->search->getSphinxService()->name = 'test5';
        Az::$app->search->getSphinxService()->updateIndex();*/

    }

    public function closure1()
    {

        // 209 11 99

        function closure_dump(Closure $c) {
            $str = 'function (';
            $r = new ReflectionFunction($c);
            $params = array();
            foreach($r->getParameters() as $p) {
                $s = '';
                if($p->isArray()) {
                    $s .= 'array ';
                } else if($p->getClass()) {
                    $s .= $p->getClass()->name . ' ';
                }
                if($p->isPassedByReference()){
                    $s .= '&';
                }
                $s .= '$' . $p->name;
                if($p->isOptional()) {
                    $s .= ' = ' . var_export($p->getDefaultValue(), TRUE);
                }
                $params []= $s;
            }
            $str .= implode(', ', $params);
            $str .= '){' . PHP_EOL;
            $lines = file($r->getFileName());
            for($l = $r->getStartLine(); $l < $r->getEndLine(); $l++) {
                $str .= $lines[$l];
            }

            return $str;
        }
    }

    public function test()
    {
        $src = 'D:\Develop\Interface\___\Form\01e9 adaptive-switch';
        $dest = 'D:\Develop\Interface\Inputs\Switch\CSSJS\@ Dead\01e9 Adaptive-Switch 2 stars';

        $this->move($src, $dest);
    }


}
