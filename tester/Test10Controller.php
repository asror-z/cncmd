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

use tests\DatabaseTestCase;
use zetsoft\actions\crud\test;
use zetsoft\models\page\PageBlocks;
use zetsoft\models\shop\ShopProduct;
use zetsoft\models\shop\ShopShipment;
use zetsoft\models\test\TestDep;
use zetsoft\service\tests\AxrorTest;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use ventest\telegram\madelineproto\MadelineProtoMessage;
use zetsoft\system\helpers\ZJsonHelper;


class Test10Controller extends ZControlCmd
{
    public function actionRun()
    {

        $model = $this->modelGet(ShopProduct::class, 198);
        vdd($model);
        // Az::$app->gitapp->gitPhp->example();
        /*Az::$app->htmlCss->css->test();*/
//        Az::$app->calls->fop->hangUp();
        // vdd(Az::$app->payme->paymeA->test());

    }
    /*   public function activeRun()
       {
           Az::$app->utility->geocoder->coder();

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

       public function payer()
       {
           $a = Az::$app->payer->currency2->convert('USD', 'RUB', 10);
           vdd($a);

           file_get_contents('/');

       }*/


}
