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
use zetsoft\models\core\CoreOnline;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class OnlineController extends ZControlCmd
{

    public function init()
    {
        parent::init();
    }

    public function actionCheck()
    {
        Az::start(__FUNCTION__);

        $onlines = CoreOnline::find()->where(['<=', 'expire', time()])->all();
        if ($onlines !== null) {
            foreach ($onlines as $online) {
                $online->delete();
            }
        }

        Az::end();
    }

}
