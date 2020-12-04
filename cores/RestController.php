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


class RestController extends ZControlCmd
{


    public  function actionRun()
    {
        Az::start(__FUNCTION__);
        Az::$app->cores->buildrest->run();
        Az::end();
    }


}
