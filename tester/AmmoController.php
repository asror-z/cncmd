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


use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

/**
 * @property void $value
 */
class AmmoController extends ZControlCmd
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

    
    /*public function actionRun()
   {
 //yaac
        //$this->actionAdd('acme.zetsoft.uz', 'www.acme.zetsoft.uz');

        //acme
        //$this->actionAdd('hype.zetsoft.uz', 'hype');

        //rw-acme-client
       // Az::$app->acme->rwAcmeClient_Zoir->getssl('hype.zetsoft.uz');
   vd(Az::$app->tests->GeoSsl->addSSLOrder());
       // vd(Az::$app->office->pandoc->docPdf("Develop/Projects/ALL/asrorz/zetsoft/upload/uploaz/eyuf/testZoir.docx"));
      //vd(Az::$app->bot->userStorage->testCase('@zetsoft @Zoirjon_Sobirov @zetsoft @Terrabayt @Terrabayt '));
      // $user_ip = Az::$app->request->userIP;
      //vd(Az::$app->maps->navigation->urlGeneratorGoogle(53));
       //vd(Az::$app->maps->navigation->urlGeneratorYandex(53));
       //vd(Az::$app->maps->currentLocation->test());
       //vd(Az::$app->maps->matrixGoogle->distanceStreet());
         //Az::$app->office->textToPdf->doc_pdf();
       //vd(Az::$app->market->wares->depWare(4));
 //      $admin = "657320262";
//        $adminuser = "zoirjon_sobirov";

   } */

}
