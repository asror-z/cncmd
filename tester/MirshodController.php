<?php
/*
 * Author: Mirshod Ibodov
 */

namespace zetsoft\cncmd\tester;

use zetsoft\models\shop\ShopOrderItem;
use zetsoft\models\test\TestMirshod;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\Az;


class MirshodController extends ZControlCmd
{


    public function actionRun()
    {
      $rent = Az::$app->market->mirshod->reninfo(4);
                   vdd($rent);
    }
        public function allRun(){
            $ketting =Az::$app->market->mirshod->GetAll();

            vdd($ketting[0]);
        }

    public function idRun(){
        $ids = [0,1,2,3,4,5,6,7];
        $GetIds = Az::$app->market->Mirshod->GetMirshodByIds($ids);
        foreach ($GetIds as $item){
            vd($item->email);
        }
    }


     public function firstFnc(){
         // $shopOrderItem = ShopOrderItem::find()->asArray()->all();
         /*$shopOrderItem = ShopOrderItem::findOne(1196);
         vdd($shopOrderItem->name);*/

         $Mirshod = new TestMirshod();
         $Mirshod->number = 12354;
         $Mirshod->email = 'mr.ibodov@gmail.com';
         $Mirshod->contact_name ='mirshod';
         $Mirshod->contact_phone ='dilshod';
         $Mirshod->save();


         $test_mirshods = TestMirshod::find()->all();
         foreach ($test_mirshods as $test_mirshod){
             echo $test_mirshod->email.EOL;
             echo $test_mirshod->contact_phone.EOL;
             echo $test_mirshod->contact_name.EOL;
             echo $test_mirshod->number;
         }
     }
     public function ads(){
         $id = 5;
         $GetId = Az::$app->market->Mirshod->GetMirshodById($id);
         vd($GetId);
     }

}























