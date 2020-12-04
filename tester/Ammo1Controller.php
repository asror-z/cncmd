<?php
/**
 * Author:  Zoirjon Sobirov
 * @license  Zoirjon Sobirov
 * linkedIn: https://www.linkedin.com/in/zoirjon-sobirov/
 * Telegram: https://t.me/zoirjon_sobirov
 * @copyright zhead, zstart, zend
 */

namespace zetsoft\cncmd\tester;


use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

/**
 * @property void $value
 */
class Ammo1Controller extends ZControlCmd
{
    public function actionRun(){
              
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
      Az::$app->acme->acmeCoreZoir->addSSL($domain_name, $project_name, false);
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
        Az::$app->acme->acmeCoreZoir->updateSSL($domain_name, $project_name, false);
    }
}
