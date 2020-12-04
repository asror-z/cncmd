<?php

/**
 * Author:  Xolmat Ravshanov
 */

namespace zetsoft\cncmd\cruds;

use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class ElasticController extends ZControlCmd
{
    public function actionRun()
    {
        Az::start(__FUNCTION__);
          Az::$app->search->elastic->index();
        Az::end();
    }

    public function actionGet()
    {
        Az::start(__FUNCTION__);
        $classes = Az::$app->smart->migra->scan();
        foreach ($classes as $class){
            $className = strtolower(bname($class));
        if (Az::$app->search->elasticsearch->indexExists($className))
            Az::$app->search->elasticsearch->index = 'test5';
            Az::$app->search->elasticsearch->getAllDoc();
        }
        Az::end();
    }



    public function actionDelete()
    {
        Az::start(__FUNCTION__);
            Az::$app->search->elasticsearch->index = 'PageAction';
            Az::$app->search->elasticsearch->deleteindex();
        Az::end();
    }



}
