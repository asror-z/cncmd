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

use zetsoft\system\control\ZControlCmd;
use zetsoft\system\Az;

class TestAcme2Controller extends ZControlCmd
{
    public function run(){
        $this->actionAdd('zoir.zetsoft.uz', 'zoir');
    }
    public function actionAdd($domain_name, $project_name)
    {
        Az::$app->acme->acmecore->addSSL($domain_name, $project_name);
    }

    public function actionRemove($domain_name)
    {
        Az::$app->acme->acmecore->removeSSL($domain_name);
    }

    public function actionUpdate($domain_name, $project_name)
    {
        Az::$app->acme->acmecore->updateSSL($domain_name, $project_name);
    }


}
