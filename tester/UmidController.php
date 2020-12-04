<?php
/**
 *
 * Author:  Asror Zakirov
 * Created: 29.06.2016 19:06
 * https://www.linkedin.com/in/asror-zakirov-166961a9
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 */

namespace zetsoft\cncmd\tester;

use zetsoft\models\shop\ShopOrder;
use zetsoft\models\shop\ShopOrderItem;
use zetsoft\models\shop\ShopProduct;
use zetsoft\models\test\Test;
use zetsoft\models\test\TestOrder;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\Az;
use zetsoft\widgets\former\ZDynaWidget;


class UmidController extends ZControlCmd
{
    public function actionRun(){
        
       /* $model = new TestOrder(['number' => 123, 'parent' => 10]);

        Az::$app->forms->modelz->save($model);*/



       /* $model_1 = TestOrder::find()
            ->where([
                'user_id' => 10
            ])
            ->all();

        foreach ($model_1 as $model){
            echo "$model->number $model->code $model->parent , | , ";
        }*/


        $model = new ShopTestFifth();

        ZDynaWidget::widget([
            'model' => $model,
        ]);
    }
}
