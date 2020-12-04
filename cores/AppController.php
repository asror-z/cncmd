<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 27.05.2019
 * Time: 14:26
 */

namespace zetsoft\cncmd\cores;


use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class AppController extends ZControlCmd
{


    public function actionEyufClean()
    {

                Az::start(__FUNCTION__);
        Az::$app->App->eyuf->user->clean();
        Az::end();
    }


}
