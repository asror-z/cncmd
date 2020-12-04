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
use Ratchet\App;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Symfony\Component\Finder\Finder;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\FormDb;
use zetsoft\models\App\eyuf\EyufScholar;
use zetsoft\service\socket\Chat;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;

class RatchetController extends ZControlCmd
{
    public function actionRun()
    {
//        Az::$app->socket->ratchetchat->run();
//        Az::$app->socket->phpiosocket_1->run();
//        Az::$app->socket->phpiosocket_2->run();
        Az::$app->socket->phpiosocket_3->run();
    }
}
