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

class CrudsController extends ZControlCmd
{

    public function actionRun()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->cruds->run();
    //    Az::$app->cores->buildWeb->run();
        Az::end();
    }


    public function actionClean()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->cruds->clean();
        Az::end();
    }

}
