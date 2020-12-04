<?php
/**
 *
 * Author:  Asror Zakirov
 * Created: 29.06.2017 19:06
 * https://www.linkedin.com/in/asror-zakirov-167961a9
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 */

namespace zetsoft\cncmd\tester;


use Addvilz\Pharaoh\Builder;
use Fusonic\Linq\Linq;
use kartik\dynagrid\DynaGrid;
use kartik\dynagrid\models\DynaGridSettings;
use pdima88\uztranslit\UzCyrToLat;
use pdima88\uztranslit\UzLatToCyr;
use PHPUnit\Framework\Assert;
use rmrevin\yii\fontawesome\FA;
use Symfony\Component\Finder\Finder;
use yii\db\Query;
use yii\helpers\StringHelper;
use zetsoft\dbdata\web\ActionWebData;
use zetsoft\dbitem\shop\ProductItem;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\former\lang\LanguageForm;
use zetsoft\former\test\TestLaptopForm;
use zetsoft\former\auth\AuthPhoneForm;
use zetsoft\former\eyuf\EyufCompletedForm;
use zetsoft\former\eyuf\EyufHigherEducationForm;
use zetsoft\former\eyuf\EyufProgramForm;
use zetsoft\models\App\eyuf\db2\CallsCdr;
use zetsoft\models\page\PageAction;
use zetsoft\models\place\PlaceAdress;
use zetsoft\models\page\PageBlocks;
use zetsoft\models\shop\ShopCategory;
use zetsoft\models\drag\DragConfigDb;
use zetsoft\models\page\PageControl;
use zetsoft\models\place\PlaceCountry;
use zetsoft\models\core\CoreInput;
use zetsoft\models\menu\Menu;
use zetsoft\models\auto\ChatMessage;
use zetsoft\models\shop\ShopOption;
use zetsoft\models\shop\ShopOptionType;
use zetsoft\models\shop\ShopProduct;
use zetsoft\models\core\CoreQueue;
use zetsoft\models\core\CoreSetting;
use zetsoft\models\ALL\Test;
use zetsoft\models\ALL\Test3;
use zetsoft\models\shop\ShopShipment;
use zetsoft\models\user\User;
use zetsoft\models\App\eyuf\Card;
use zetsoft\models\App\eyuf\EyufCompatriot;
use zetsoft\models\App\eyuf\EyufDocument;
use zetsoft\models\App\eyuf\EyufDocumentType;
use zetsoft\models\App\eyuf\EyufScholar;
use zetsoft\models\App\eyuf\ScholarTest;
use zetsoft\models\test\TestAsror;
use zetsoft\models\test\TestDep;
use zetsoft\models\App\eyuf\TreeProduct;
use zetsoft\models\shop\Product;
use zetsoft\service\acme\YaacAcmeTest;
use zetsoft\service\ALL\Utility;
use zetsoft\service\cores\Category;
use zetsoft\service\cores\Subscribe;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\actives\ZArrayQuery;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\helpers\ZTest;
use zetsoft\system\helpers\ZVarDumper;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\blocks\ZFullCalendarWidget;
use zetsoft\widgets\former\ZArrayWidget;
use zetsoft\widgets\former\ZDetailWidget;
use zetsoft\widgets\former\ZDynaWidget;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\former\ZGrapesJsWidget;
use zetsoft\widgets\former\ZGrapesJsWidgetRavshan;
use zetsoft\widgets\former\ZListViewWidgetOld;
use zetsoft\widgets\former\ZMultiWidget;
use zetsoft\widgets\former\ZViewWidget;
use zetsoft\widgets\incores\ZMCheckboxGroupWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZHTextareaWidget;
use zetsoft\widgets\inputes\ZImgCheckboxGroupWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\market\ZMenuWidget;
use zetsoft\widgets\menus\ZMmenuWidget;
use zetsoft\widgets\navigat\ZButtonWidget;
use zetsoft\widgets\navigat\ZGAccordionWidget;
use zetsoft\widgets\values\ZMultiViewWidget;
use function Dash\Curry\all;
use function Dash\where;
use function Spatie\SslCertificate\length;

//require Root . '/ventest/phar/vendor/autoload.php';

class TestSardorController extends ZControlCmd
{

    public function actionRun()
    {
        $a = Az::$app->market->offerTest->test();
    }


}
