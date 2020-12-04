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

class VisualsController extends ZControlCmd
{




    public function actionRun()
    {
        Az::start(__FUNCTION__);

        Az::$app->smart->visuals->model();
        Az::$app->smart->visuals->form();
        Az::$app->smart->cruds->run();

        Az::end();
    }

    public function actionModel()
    {
        Az::start(__FUNCTION__);

        Az::$app->smart->visuals->model();

        Az::end();
    }

    public function actionForm()
    {
        Az::start(__FUNCTION__);

        Az::$app->smart->visuals->form();

        Az::end();
    }

}
