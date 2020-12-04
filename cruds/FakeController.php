<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 27.05.2019
 * Time: 14:26
 */

namespace zetsoft\cncmd\cruds;


use Cocur\Slugify\Slugify;
use zetsoft\models\page\PageControl;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZInflector;

class FakeController extends ZControlCmd
{




    public function actionRun()
    {
        Az::start(__FUNCTION__);
        
        Az::$app->smart->fake->model = new PageControl();
        Az::$app->smart->fake->allApp = new PageControl();

        Az::$app->smart->fake->run();
        Az::end();
    }


    public function actionForm()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->fake->form();
        Az::end();
    }


    public function actionService()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->fake->service();
        Az::end();


    }

    public function actionServiceTest()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->fake->serviceTest();
        Az::end();


    }

    public function actionModel()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->fake->model();
        Az::end();
    }

}
