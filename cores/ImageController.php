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
use yii\caching\TagDependency;
use zetsoft\dbitem\core\ServiceItem;
use zetsoft\models\page\PageAction;
use zetsoft\models\shop\ShopCategory;
use zetsoft\models\page\PageControl;
use zetsoft\models\App\eyuf\EyufCompatriot;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class ImageController extends ZControlCmd
{


    public $modelClassName;
    public $attribute;
    public $id;
    public $x;
    public $y;

    public function options($actionID)
    {
        return array_merge(parent::options($actionID), [
            'modelClassName', 'attribute', 'id', 'x', 'y',
        ]);
    }


    public function actionRun()
    {
        Az::start(__FUNCTION__);

        Az::$app->image->intervent->modelClassName = EyufCompatriot::class;
        Az::$app->image->intervent->attribute = 'photo';
        Az::$app->image->intervent->id = 6;

        Az::end();
    }


    public function actionResize()
    {
        Az::start(__FUNCTION__);
        Az::$app->image->intervent->modelClassName = $this->modelClassName;

        Az::$app->image->intervent->attribute = $this->attribute;

        Az::$app->image->intervent->id = $this->id;

        foreach(Az::$app->image->intervent->scan(Az::$app->image->intervent->path()) as $fileName){
            Az::$app->image->intervent->resize($fileName,222, 222);
        }
        
        Az::end();
    }


    

}
