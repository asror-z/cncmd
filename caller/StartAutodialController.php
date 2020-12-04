<?php
/**
 * Created by PhpStorm.
 * Created by:Xolmat Ravshanov
 * Date: 27.05.2019
 * Time: 14:26
 */

namespace zetsoft\cncmd\caller;

use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class StartAutodialController extends ZControlCmd
{

    public $time;

    /*public $agentId;*/

    public function options($actionID)
    {
        return array_merge(parent::options($actionID), [
            'time'
        ]);
    }


    public function actionRun()
    {
        Az::start(__FUNCTION__);
        if (!empty($this->time))
            Az::$app->calls->marceAMI->time = $this->time;


        Az::$app->calls->marceAMI->run();
        Az::end();
    }


}
