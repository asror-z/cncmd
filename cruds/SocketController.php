<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 27.05.2019
 * Time: 14:26
 */

namespace zetsoft\cncmd\cruds;


use Cocur\Slugify\Slugify;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZInflector;

class SocketController extends ZControlCmd
{


    public function actionRun()
    {
        Az::start(__FUNCTION__);
        Az::$app->socket->zSocketIo->run();
        //Az::$app->socket->ratchetchat->run();
        Az::end();
    }



    public function actionStatus()
    {
        Az::$app->socket->checkStatus->run();
    }

    public function actionTest()
    {
        Az::$app->socket->ratchetchatTest->run();
    }

    public function actionTest2()
    {
        Az::$app->socket->ratchetchatTest2->run();
    }

    


}
