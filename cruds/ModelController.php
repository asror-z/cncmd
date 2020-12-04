<?php

/**
 *
 *
 * Author:  Doniyor Mamatkulov
 *
 * https://www.linkedin.com/in/doniyor-mamatkulov-536453aa/
 * https://github.com/doniyorbekm
 *
 */

namespace zetsoft\cncmd\cruds;

use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use Yii;
use zetsoft\system\helpers\ZInflector;

class ModelController extends ZControlCmd
{




    public function actionRun()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->model->run();
        Az::end();
    }

    public function actionTable()
    {

        Az::start(__FUNCTION__);
        Az::$app->smart->model->dbase = $this->dbase;
        Az::$app->smart->model->table();
        Az::end();
    }

    public function actionClean()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->model->clean();
        Az::end();
    }


}
