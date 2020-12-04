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

class MigraController extends ZControlCmd
{


    public function actionRun()
    {
        
        Az::start(__FUNCTION__);
        Az::$app->smart->migra->clean();
        Az::$app->smart->migra->run();
        Az::end();
    }


    public function actionClean()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->migra->clean();
        Az::end();
    }

    public function actionScan()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->migra->scan();
        Az::end();
    }

    public function actionGenid()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->migra->genid();
        Az::end();
    }

}
