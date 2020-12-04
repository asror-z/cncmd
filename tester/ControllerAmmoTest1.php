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



use zetsoft\service\diff\test_ammo;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class ControllerAmmoTest1 extends ZControlCmd
{
    public function actionRun()
    {
      // vdd(Az::$app->market->order->GetUserOrderListTest());
        $a = Az::$app->market->offerTest->test();
       
    }
}
