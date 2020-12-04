<?php
/**
 * Created by: Xolmat Ravshanov
 * Date: 27.05.2019
 * Time: 14:26
 */

namespace zetsoft\cncmd\caller;


use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class MarceAmiController extends ZControlCmd
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
        if (!empty($this->remoteIp))
            Az::$app->calls->marceAMI->remoteIp = $this->remoteIp;


        Az::$app->calls->marceAMI->run();
        Az::end();
    }


    public function actionCall()
    {
        Az::start(__FUNCTION__);

        Az::$app->calls->marceAMI->call($this->agentId);

        Az::end();
    }

    public function actionStart()
    {

        Az::start(__FUNCTION__);

           Az::$app->calls->marceAMI->start();

        Az::end();
        
    }


}
