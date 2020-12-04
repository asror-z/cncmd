<?php
/**
 *
 * Author:  Asror Zakirov
 * Created: 29.06.2016 19:06
 * https://www.linkedin.com/in/asror-zakirov-166961a9
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 */

namespace zetsoft\cncmd\tester;

use zetsoft\models\App\eyuf\db3\CxpanelUsers;
use zetsoft\models\App\eyuf\db3\Devices;
use zetsoft\models\App\eyuf\db3\Sip;
use zetsoft\models\App\eyuf\db3\Users;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\Az;


class TestXFI extends ZControlCmd
{
    public function actionRun(){
        //Az::$app->freePBX->pBXwebdriver->config();
        //Az::$app->freePBX->pBXwebdriver->autoLogin();
        //Az::$app->freePBX->pBXwebdriver->createExtension();
        Az::$app->auto->FpbxExts->config();
        Az::$app->auto->FpbxExts->autoLogin();
        Az::$app->auto->FpbxExts->createExtension();
        //Az::$app->auto->FpbxExtsX->config();
        //Az::$app->auto->FpbxExtsX->autoLogin();
        //Az::$app->auto->fpbxExts->createExtension();
    }

}
