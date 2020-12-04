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

use Afosto\Acme\Client;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use zetsoft\system\control\ZControlCmd;

// require Root . '/ventest/acme/vendor/autoload.php';

class TestAcmeClientController extends ZControlCmd
{
    public function actionRun()
    {
        Az::$app->acme->yaacacme->addSSL('doggy.zetsoft.uz', 'doggy');
    }
}
