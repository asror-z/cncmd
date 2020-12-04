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

class InsertController extends ZControlCmd
{

    public function actionClean()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->insert->clean();
        Az::end();
    }

    public function actionApply()
    {
        Az::start(__FUNCTION__);

        if ($this->allApp) {
            foreach ($this->appList as $app)
                $this->execute($app);
            return true;
        }

        Az::$app->smart->insert->apply();

        Az::end();
    }

    public function actionCreate()
    {
        Az::start(__FUNCTION__);

        Az::$app->smart->insert->create();

        Az::end();
    }

}
