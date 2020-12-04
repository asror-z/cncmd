<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * Date:    21.05.2019
 * https://www.linkedin.com/in/asror-zakirov
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\cncmd\cores;

use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class ThemeController extends ZControlCmd
{

    public function actionRun()
    {
        Az::start(__FUNCTION__);
        Az::$app->temps->themes->category();
        Az::$app->temps->themes->template();
        Az::end();
    }

}
