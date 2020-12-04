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

use zetsoft\cncmd\cruds\ZCrudTrait;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class LangController extends ZControlCmd
{


    
    public function actionFile()
    {
        Az::start(__FUNCTION__);
        Az::$app->cores->langs->file();
        Az::end();
    }
    
    public function actionScan()
    {
        Az::start(__FUNCTION__);
        Az::$app->cores->langs->scan();
        Az::end();
    }

    public function actionModel()
    {
        Az::start(__FUNCTION__);
        Az::$app->cores->langs->model();
        Az::end();
    }


    public function actionLang()
    {
        Az::start(__FUNCTION__);
        Az::$app->cores->langs->lang();
        Az::end();
    }

    public function actionRun()
    {
        Az::start(__FUNCTION__);
        Az::$app->cores->langs->run();
        Az::end();
    }

}


