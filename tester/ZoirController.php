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
use Illuminate\Support\Collection;
use Illuminate\Support\Reflector;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Shared\OLE\PPS\Root;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Tcpdf;
use Spatie\CollectionMacros\CollectionMacroServiceProvider;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;
use yii\caching\TagDependency;
use zetsoft\dbitem\stats\StatsOrderItem;
use zetsoft\former\shop\ShopDailyReportForm;
use zetsoft\models\App\eyuf\db2\Cdr;
use zetsoft\models\dyna\DynaChess;
use zetsoft\models\shop\ShopBrand;
use zetsoft\models\shop\ShopCatalog;
use zetsoft\models\shop\ShopCatalogWare;
use zetsoft\models\shop\ShopCategory;
use zetsoft\models\shop\ShopElement;
use zetsoft\models\shop\ShopOrder;
use zetsoft\models\shop\ShopOrderItem;
use zetsoft\models\shop\ShopProduct;
use zetsoft\models\shop\ShopStatus;
use zetsoft\models\test\TestAsror;
use zetsoft\models\test\TestDep;
use zetsoft\models\test\TestTerrabayt;
use zetsoft\models\user\User;
use zetsoft\models\user\UserCompany;
use zetsoft\models\user\UserRbacRest;
use zetsoft\models\ware\Ware;
use zetsoft\models\ware\WareAccept;
use zetsoft\models\ware\WareEnter;
use zetsoft\models\ware\WareEnterItem;
use zetsoft\models\ware\WareExitItem;
use zetsoft\service\auto\Driver;
use zetsoft\service\cores\Auth;
use zetsoft\service\office\ZipArchive;
use zetsoft\service\utility\Menu;
use zetsoft\service\utility\serialize;
use zetsoft\system\actives\ZActiveQuery;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\control\ZSocketIo;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZJsonHelper;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\helpers\ZTest;
use zetsoft\system\helpers\ZVarDumper;
use function Amp\Parallel\Worker\enqueueCallable;
use function Amp\Promise\all;
use function Amp\Promise\wait;
use function Dash\includes;
use function Spatie\array_keys_exist;

/**
 *
 * @property void $value
 */
class ZoirController extends ZControlCmd
{

    public function actionRun(){

        $this->actionAddSSL('eyuf.zetsoft.uz', 'eyuf', false);
    }

    public function actionAddSSL($domain_name,$project_name,$sslConf)
    {
        //yaac
        // $this->actionAddSSL('hype.zetsoft.uz', 'www.hype.zetsoft.uz');

        //acme
        //$this->actionAddSSL('hype.zetsoft.uz', 'hype', true);

        //rwAcmeClient
        //  $this->actionAddSSL('hype.zetsoft.uz', );
        //Az::$app->acme->yaac_Zoir->getssl($domain_name, $project_name);
        // Az::$app->acme->rwAcmeClient_Zoir->getssl($domain_name);

        Az::$app->acme->acmeCoreZoir->addSSL($domain_name, $project_name,$sslConf);
    }

    public function actionAdd()
    {
        //faster way to read user input
        //fscanf(STDIN, "%d %d", $domain_name, $project_name);

        //national way to read user input
        echo "Please enter domain name (market.zetsoft.uz)\n";
        $domain_name = explode(' ', readline());
        $domain_name = implode($domain_name);
        echo "Please enter project name (market)\n";
        $project_name = explode(' ', readline());
        $project_name = implode($project_name);
        echo "Certificate will be added soon \n" ;
        sleep(2);
        //Az::$app->acme->yaac_Zoir->getssl($domain_name, $project_name);
        Az::$app->acme->acmeCoreZoir->updateSSL($domain_name, $project_name);
    }

    public function actionRemove()
    {
        //fscanf(STDIN, "%d", $domain_name);
        echo "Please enter domain name (market.zetsoft.uz)\n";
        $domain_name = explode(' ', readline());
        $domain_name = implode($domain_name);

        Az::$app->acme->acmeCoreZoir->removeSSL($domain_name);
    }

    public function actionUpdate()
    {
        echo "Please enter domain name (market.zetsoft.uz)\n";
        $domain_name = explode(' ', readline());
        $domain_name = implode($domain_name);
        echo "Please enter project name (market)\n";
        $project_name = explode(' ', readline());
        $project_name = implode($project_name);
        echo "Certificate will be updated soon \n" ;
        sleep(2);
        Az::$app->acme->acmeCoreZoir->updateSSL($domain_name, $project_name);
    }


}
