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

class NormsController extends ZControlCmd
{




    public function actionRun()
    {
        Az::start(__FUNCTION__);
        if ($this->allApp) {
            foreach ($this->appList as $app)
                $this->execute($app);
            return true;
        }
        
        Az::$app->smart->norms->run();
        Az::end();
    }


    public function actionForm()
    {
        Az::start(__FUNCTION__);


        if ($this->allApp) {
            foreach ($this->appList as $app)
                $this->execute($app);
            return true;
        }

        Az::$app->smart->norms->form();
        Az::end();
    }


    public function actionService()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->service->run();
        Az::end();


    }


    public function actionModel()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->norms->model();
        Az::end();
    }

}
