<?php

/**
 *
 * Author:  NurbekMakhmudov
 *
 * @todo  Zetsoft workers list
 *
 */

namespace zetsoft\cncmd\tester;


require Root . '/vendori/utility/league/vendor/autoload.php';

use yii\base\Exception;
use zetsoft\models\App\eyuf\Card;
use zetsoft\models\App\eyuf\EyufScholar;
use zetsoft\models\App\eyuf\ScholarTest;
use zetsoft\models\App\eyuf\TreeProduct;
use zetsoft\models\auto\ChatMessage;
use zetsoft\models\shop\Product;
use zetsoft\models\test\Test5;
use zetsoft\models\test\TestZetsoftWorkers;
use zetsoft\service\acme\YaacAcmeTest;
use zetsoft\service\cores\Category;
use zetsoft\service\cores\Subscribe;
use zetsoft\system\control\ZControlCmd;


class TestZetsoftWorkersController extends ZControlCmd
{

    public function actionRun()
    {
        TestZetsoftWorkers::find();
    }

    public function addWorkers()
    {
//          return  throw new Exception();
    }

    public function getTempWorkers()
    {

    }



}
