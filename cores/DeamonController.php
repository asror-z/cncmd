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
use zetsoft\system\control\ZSocketIo;

class

DeamonController extends ZControlCmd
{
    public function actionChat()
    {
        Az::start(__FUNCTION__);
        Az::$app->socket->zSocketIo->run();
        Az::end();
    }

    public function actionCallCdr($period)
    {
        Az::start(__FUNCTION__);
        Az::$app->calls->fillCdr->real($period);
        Az::end();
    }
    public function actionCallCell($period)
    {
        Az::start(__FUNCTION__);
        Az::$app->calls->fillCell->real($period);
        Az::end();
    }
}
