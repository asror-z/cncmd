<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 27.05.2019
 * Time: 14:26
 */

namespace zetsoft\cncmd\caller;

use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class FillController extends ZControlCmd
{

    public $agentId;
    public $remoteIp;

    public function options($actionID)
    {
        return array_merge(parent::options($actionID), [
            'agentId', 'remoteIp'
        ]);
    }


    public function actionRun()
    {
        Az::start(__FUNCTION__);

        Az::$app->calls->fillCdr->run();

        Az::end();
    }

    public function actionStart()
    {
         Az::start(__FUNCTION__);

         Az::$app->calls->fillCdr->real();

         Az::end();
    }

    public function actionCell()
    {
        Az::start(__FUNCTION__);

        Az::$app->calls->fillCell->run();

        Az::end();
    }

    public function actionCellStart()
    {
        Az::start(__FUNCTION__);

        Az::$app->calls->fillCell->real();

        Az::end();
    }

}
