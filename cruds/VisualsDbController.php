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

class VisualsDbController extends ZControlCmd
{




    public function actionRun()
    {
        Az::start(__FUNCTION__);

        Az::$app->smart->visualsDb->migraModel();
        Az::$app->smart->visualsDb->normsForm();
        Az::$app->smart->cruds->run();

        Az::end();
    }

    public function actionModel()
    {
        Az::start(__FUNCTION__);

        Az::$app->smart->visualsDb->migraModel();

        Az::end();
    }

    public function actionForm()
    {
        Az::start(__FUNCTION__);

        Az::$app->smart->visualsDb->normsForm();

        Az::end();
    }

}
