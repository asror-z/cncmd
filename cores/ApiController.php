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

use Boot;
use Yii;
use yii\caching\TagDependency;
use zetsoft\cncmd\cruds\ZCrudTrait;
use zetsoft\models\page\PageAction;
use zetsoft\models\page\PageControl;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class


ApiController extends ZControlCmd
{

    public function actionTest()
    {
        Az::start(__FUNCTION__);
        Az::$app->cores->buildApi->test();
        Az::end();
    }

    public function actionRun()
    {
        Az::start(__FUNCTION__);
        Az::$app->cores->buildApi->run();
        Az::end();
    }

    public function actionRest()
    {
        Az::start(__FUNCTION__);
        Az::$app->cores->buildRest->run();
        Az::end();
    }

    public function actionAll()
    {
        Az::start(__FUNCTION__);
        Az::$app->cores->buildApi->folder();
        Az::$app->cores->buildApi->action();
        Az::end();
    }

    public function actionAction()
    {
        Az::start(__FUNCTION__);
        Az::$app->cores->buildApi->action();
        Az::end();
    }

}
