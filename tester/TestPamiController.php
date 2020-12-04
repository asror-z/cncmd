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


use Carbon\Carbon;
use http\Url;
use kartik\dynagrid\DynaGrid;
use kartik\helpers\Enum;
use Opis\Closure\SerializableClosure;
use Underscore\Types\Arrays;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\FileHelper;
use yii\helpers\Html;
use zetsoft\dbcore\ALL\UserCore;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\former\test\TestLaptopForm;
use zetsoft\former\auth\AuthLoginForm;
use zetsoft\former\eyuf\EyufCompletedForm;
use zetsoft\former\eyuf\EyufProgramForm;
use zetsoft\models\page\PageAction;
use zetsoft\models\user\UserBlocked;
use zetsoft\models\page\PageControl;
use zetsoft\models\place\PlaceCountry;
use zetsoft\models\faqs\Faqs;
use zetsoft\models\core\CoreInput;
use zetsoft\models\menu\Menu;

use zetsoft\models\page\PageModule;
use zetsoft\models\user\User;
use zetsoft\models\App\eyuf\EyufDocument;
use zetsoft\models\App\eyuf\EyufDocumentType;
use zetsoft\service\menu\ALL;
use zetsoft\service\menu\ALLNew;
use zetsoft\service\smart\Insert;
use zetsoft\service\utility\UrlApp;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\actives\ZArrayQuery;
use zetsoft\system\assets\ZMenu;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZUrl;
use zetsoft\system\helpers\ZVarDumper;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\audios\ZPlayersVideoPlyrWidget;
use zetsoft\widgets\blocks\ZEChartNew2Widget;
use zetsoft\widgets\blocks\ZRefreshWidget;
use zetsoft\widgets\charts\ZChartWidget;
use zetsoft\widgets\dialogs\ZSweetAlert2WidgetOLD;
use zetsoft\widgets\former\ZAjaxWidget;

use zetsoft\widgets\former\ZDynaWidget;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\images\ZCarouselSlickWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZJqueryFileUploadNewWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\menus\ZMMmenu3Widget_2;
use zetsoft\widgets\menus\ZMmenuWidget;
use zetsoft\widgets\menus\ZMMmenuWidget_;
use zetsoft\widgets\menus\ZMMmenuWidgetMap;
use zetsoft\widgets\menus\ZMMmenuWidgetOLD;
use zetsoft\widgets\menus\ZNavbar3Widget;
use zetsoft\widgets\navigat\ZButtonWidget;
use zetsoft\widgets\navigat\ZMdbCardWidget;
use zetsoft\widgets\themes\ZFriendRequestsWidget;
use zetsoft\widgets\themes\ZMessageWidgetOLD1;


class TestPamiController extends ZControlCmd
{

    /**
     *
     * Function  actionRun
     * @throws \Exception
     */
    public function actionRun()
    {
        //Az::$app->menu->davlat->my = 'AAAAAAAAAAAAA';
        //echo Az::$app->menu->davlat->test('44444');
        //t->test('44444');
        // Az::$app->asteriskk->ReactAmiF->
        //echo Az::$app->App->eyuf->davlaoriginate();
        //Az::$app->asteriskk->Pami->ext = '204';
        //Az::$app->asteriskk->Pami->queueAdd();
        
        Az::$app->asteriskk->getReactAmiF()->ext = '204';
        Az::$app->asteriskk->getReactAmiF()->originate();
        Az::$app->asteriskk->getReactAmiF()->loopRun();
    }
}

