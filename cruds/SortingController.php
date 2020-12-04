<?php

/**
 *
 *
 * Author:  Kudratillo Makhammadzhanov
 *
 *
 */

namespace zetsoft\cncmd\cruds;

use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use Yii;
use zetsoft\system\helpers\ZInflector;

class SortingController extends ZControlCmd
{

    public function actionRun()
    {
        Az::start(__FUNCTION__);

        Az::$app->smart->sorting->run();

        Az::end();
    }

}
