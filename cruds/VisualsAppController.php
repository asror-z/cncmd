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

class VisualsAppController extends ZControlCmd
{




    public function actionRun()
    {
        Az::start(__FUNCTION__);

        Az::$app->smart->visualsApp->model();
        Az::$app->smart->visualsApp->form();
        Az::$app->smart->visualsApp->columnsForm();
        Az::$app->smart->visualsApp->columnsModel();

        Az::end();
    }

    public function actionModel()
    {
        Az::start(__FUNCTION__);

        Az::$app->smart->visualsApp->model();
        Az::$app->smart->visualsApp->columnsModel();

        Az::end();
    }

    public function actionForm()
    {
        Az::start(__FUNCTION__);

        Az::$app->smart->visualsApp->form();
        Az::$app->smart->visualsApp->columnsForm();

        Az::end();
    }

}
