<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 27.05.2019
 * Time: 14:26
 */

namespace zetsoft\cncmd\cruds;


use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class RunController extends ZControlCmd
{

    public function actionCreate()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->model->run();
        Az::$app->smart->cruds->run();
        Az::$app->smart->insert->create();
        Az::end();
    }

    public function actionCreateTable()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->model->table();
        Az::$app->smart->cruds->run();
        Az::$app->smart->norms->model();
        Az::end();
    }

    public function actionApply()
    {

        Az::start(__FUNCTION__);

        if ($this->allApp) {
            foreach ($this->appList as $app)
                $this->execute($app);
            return true;
        }

        Az::$app->smart->norms->model();
        Az::$app->smart->insert->create();
        Az::$app->smart->migra->clean();
        Az::$app->smart->migra->run();
        Az::$app->smart->migra->genid();
        Az::$app->smart->insert->apply();
        Az::$app->utility->cache->flush();

        Az::end();
    }

      public function actionApplyEmpty()
    {

        Az::start(__FUNCTION__);

        if ($this->allApp) {
            foreach ($this->appList as $app)
                $this->execute($app);
            return true;
        }

        Az::$app->smart->norms->model();
        Az::$app->smart->migra->clean();
        Az::$app->smart->migra->run();
        Az::$app->smart->insert->apply();
        
        Az::$app->utility->cache->flush();

        Az::end();
    }



    public function actionClean()
    {
        Az::start(__FUNCTION__);
        Az::$app->smart->cruds->clean();
        Az::$app->smart->insert->clean();
        Az::$app->smart->migra->clean();
        Az::$app->smart->model->clean();
        Az::end();
    }

}
