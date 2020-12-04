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

use zetsoft\models\shop\ShopCatalog;
use zetsoft\models\shop\ShopStatus;
use zetsoft\models\test\TestTerrabayt;
use zetsoft\models\test\TestDep;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use function Amp\Promise\all;
use function Dash\includes;

class Test12Controller extends ZControlCmd
{

    public function actionRun()
    {
        Az::$app->soaps->Wsdl2phpgenerator->example();
        //Az::$app->tests->
      //  Az::$app->markup->css->test();
 //         Az::$app->geo->maxmindDb->getIp('91.196.76.23');
//    $this->insertStatus();
//           vd(Az::$app->market->companyStat->countByStatusJoin(2));
//           vd(Az::$app->market->companyStat->orderByStatusAndCompany(7));
        //$model = new TestTerrabayt();
       
      //  $model->lang = 'it is lang';
      //  $model->save();
//       Az::$app->market->product->test();
        // vdd($this->bootFull('PlaceAdress'));
        //Az::$app->socket->saveGrapes->run();
       // Az::$app->office->tcpdf->test();
        // $a = Az::$app->market->questionTest->test();
         //$a = Az::$app->market->brand->test();
//        Az::$app->geo->ipInfos->getinfo('195.158.23.242');
        //$a = Az::$app->market->cartTest->test();
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
            "На комплектации",
            "В ожидании комплектации",
        ];

        foreach ($array as $item) {
            $model = new ShopStatus();
            $model->name = $item;
            $model->save();
        }
    }

    public function link()
    {
        $value = [
            "page_module_id" => "19",
            "core_control_id" => "301",
            "page_action_id" => "707",
            "name" => "cccc",
        ];

        $attr = 'form';
        $model = TestDep::findOne(4);

        Az::$app->forms->wiData->clean();
        Az::$app->forms->wiData->model = $model;
        Az::$app->forms->wiData->attribute = $attr;

        $value = Az::$app->forms->wiData->value();
        vdd($value);

    }


    public function test()
    {
        $catalogs = ShopCatalog::find()->where("offer <@ '{\"offer\": \"super_offer\"}'")->all();
        vdd($catalogs);
    }

    private function isTelNumber(&$value)
    {
        $value = str_replace(array('+', '-', ' '), '', $value);
        return is_numeric($value);
    }

    public function cat3()
    {
        /* $a = exec('cmd /c ping mail.ru -t');*/
        /*       shell_exec('cmd /c ping mail.ru -t');
               passthru('cmd /c ping mail.ru -t');
               exec('cmd /c ping mail.ru -t');*/

    }

    public function cat2()
    {

        /*  $item = new ServiceItem();
          $item->namespace = 'reacts';
          $item->service = 'ChildProcess';
          $item->method = 'runCommand';

          $item->args = 'cmd /c ping mail.ru -t';

          echo Az::$app->utility->execs->service($item);*/


//        $item = new ServiceItem();
//        $item->App = true;
//        $item->service = 'Davlat';
//        $item->method = 'test';
//
//        $item->args = ['asdfasdf'];
//
//        echo Az::$app->utility->execs->service($item);


    }

    public function cat()
    {

        /*
                $mains = CoreCategoryOne::find()
                    ->where([
                        'child' => []
                    ])
                    ->all();*/


        /*
                $childs = CoreCategoryOne::find()
                    ->where([
                        'id' => $category->child
                    ])
                    ->all();*/


        /*  vd($mains);*/

    }


}
