<?php

/**
 *
 * Author:  NurbekMakhmudov
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
use zetsoft\models\shop\ShopOrder;
use zetsoft\models\ware\WareEnterItem;
use zetsoft\service\acme\YaacAcmeTest;
use zetsoft\service\cores\Category;
use zetsoft\service\cores\Subscribe;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

/**
 * @author NurbekMakhmudov
 * @TODO boshqa odam o'zgartirish kiritmasin
 */
class AmirController extends ZControlCmd
{

    #region Action Run
    public function actionRun()
    {

        Az::$app->maths->mathphp->example();
    }




}
