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


use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;


class SpatieController extends ZControlCmd
{
    public function actionRun()
    {

        /*Az::$app->spatie->spatieString->test();*/

        Az::$app->spatie->spatieUrl->test();

        /*Az::$app->spatie->tsetUrl->test();*/
    }
    
}

