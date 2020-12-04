<?php

/**
 *
 * Author: Jamshid Ismailov
 *
 */

namespace zetsoft\cncmd\tester;


require Root . '/vendori/utility/league/vendor/autoload.php';

use Addvilz\Pharaoh\Builder;
use zetsoft\models\ALL\Test;
use zetsoft\models\ALL\Test3;
use zetsoft\models\App\eyuf\Card;
use zetsoft\models\App\eyuf\db2\CallsCdr;
use zetsoft\models\App\eyuf\EyufScholar;
use zetsoft\models\App\eyuf\ScholarTest;
use zetsoft\models\App\eyuf\TreeProduct;
use zetsoft\models\auto\ChatMessage;
use zetsoft\models\shop\Product;
use zetsoft\service\acme\YaacAcmeTest;
use zetsoft\service\cores\Category;
use zetsoft\service\cores\Subscribe;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class JamshidController extends ZControlCmd
{

    public function actionRun()
    {

        $plus = Az::$app->tests->jamshidTest->increasing(25,25);
        echo $plus;
    }

                               
}
