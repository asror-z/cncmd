<?php
/**
 * Created by PhpStorm.
 * Created By :Xolmat Ravshanov
 * Date: 27.05.2019
 * Time: 14:26
 */

namespace zetsoft\cncmd\caller;

use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class CallFileController extends ZControlCmd
{
    public $agentId;
    public $remoteIp;


    public function options($actionID)
    {
        return array_merge(parent::options($actionID), [
            'agentId', 'remoteIp'
        ]);
    }

    /**
     * creates new application
     * php excmd\ALL\asrorz.php cruds/adder/create $app $domain
     * Function  actionCreate
     * @param $app - application name - string [0, 5]
     * @param $domain - example.test
     */

    public function actionRun()
    {

        Az::start(__FUNCTION__);
        Az::$app->calls->dialCallFile->run();
        Az::end();
    }

    public function actionCall()
    {

        Az::start(__FUNCTION__);

        Az::$app->calls->dialCallFile->call($this->agentId);
        vd($this->agentId);
        Az::end();
    }


    public function actionStart()
    {

        Az::start(__FUNCTION__);
        if (!empty($this->remoteIp))
            Az::$app->calls->dialCallFile->remoteIp = $this->remoteIp;


        vd($this->remoteIp);
        Az::$app->calls->dialCallFile->start();
        Az::end();
    }


}
