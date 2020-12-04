<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * Date:    21.05.2019
 * https://www.linkedin.com/in/asror-zakirov
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\cncmd\cores;

use zetsoft\dbitem\core\ServiceItem;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class QueueController extends ZControlCmd
{
    /* Predefined Times in CoreQueue Model for deleting queue
     *
     * '15m' => '15 minute',
        '30m' => '30 minute',
        '1h' => '1 hour',
        '12h' => '12 hour',
    */
    public const time = [
        '15m' => '15 minute',
        '30m' => '30 minute',
        '1h' => '1 hour',
        '12h' => '12 hour',
    ];
    public $namespace;
    public $service;
    public $time;

    public function options($actionID)
    {
        return array_merge(parent::options($actionID), [
            'namespace', 'service', 'time',
        ]);
    }

    public function actionClear()
    {
        Az::start(__FUNCTION__);
        Az::$app->utility->execs->clearQueue($this->time);
        Az::end();
    }

    public function actionService()
    {
        Az::start(__FUNCTION__); 

        $item = new ServiceItem();
        $item->App = true;
        $item->service = 'Davlat';
        $item->method = 'test';

        $item->args = ['asdfasdf'];

        echo Az::$app->utility->execs->service($item);
        Az::end();
    }

    public function actionAll()
    {
        Az::start(__FUNCTION__);
        Az::$app->utility->execs->runAllQueue();
        Az::end();
    }
    public function actionRun($id = null)
    {
        Az::start(__FUNCTION__);
        Az::$app->utility->execs->serviceRun($id);
        Az::end();
    }
    public function actionRunqueue($id = null)
    {
        Az::start(__FUNCTION__);
        Az::$app->utility->execs->runQueue($id);
        Az::end();
    }



    

}
