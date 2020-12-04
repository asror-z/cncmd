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

class NameController extends ZControlCmd
{




    public function actionRun()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->name->run();

        Az::end();
    }


    public function actionModel()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->name->model();
        Az::end();
    }

}
