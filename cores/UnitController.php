<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 27.05.2019
 * Time: 14:26
 */

namespace zetsoft\cncmd\cores;


use Cocur\Slugify\Slugify;
use zetsoft\models\page\PageControl;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZInflector;

class UnitController extends ZControlCmd
{
    public function actionRun()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->tester->run();
        Az::end();
    }
}
