<?php
/**
 * Created by: Xolmat Ravshanov
 * Date: 27.05.2019
 * Time: 14:26
 */

namespace zetsoft\cncmd\caller;


use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class CreateExtentionController extends ZControlCmd
{

    public function options($actionID)
    {
          return null;
    }


    public function actionRun()
    {
        Az::start(__FUNCTION__);

            Az::$app->auto->fpbxExtention->createAllExtentions();

        Az::end();
    }

}
