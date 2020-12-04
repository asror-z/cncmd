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

use zetsoft\models\shop\ShopBrand;
use zetsoft\models\shop\ShopOption;
use zetsoft\models\shop\ShopOptionBranch;
use zetsoft\models\shop\ShopCategory;
use zetsoft\models\shop\ShopOptionType;
use zetsoft\models\shop\ShopOrder;
use zetsoft\models\user\UserCompany;
use zetsoft\models\test\Test;
use zetsoft\service\cores\Date;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use function Spatie\array_merge_values;


class BahodircnController extends ZControlCmd
{
    public $core_options;
    public $shop_option_branches;

    public function actionRun()
    {

        Az::$app->market->reportBahodir->data();

        $shopOrder = ShopOrder::find()
            ->where(['id'=>1861])
            ->asArray()
            ->all();
        Az::$app->market->reportBahodir->getDeliveryCount($shopOrder);

    /*    $modelClassName = 'Ware';
        $query = $this->httpGet('query');

        if (empty($modelClassName))
            throw new \InvalidArgumentException('modelClassName required', 403);

        $modelClass = $this->bootFull($modelClassName);

        Az::$app->office->json->modelClass = $modelClass;
        Az::$app->office->json->modelName = $modelClassName;*/
//        Az::$app->office->json->checkkeys = [69];

//        Az::$app->office->json->query = "active=false";
//        Az::$app->office->json->run();


//        echo Az::$app->jsonb->exporttojson->zakaziOperatorovJson(['1935','1952']);
//        echo Az::$app->jsonb->exporttojson->priyomkiJson(['326','328'],263);
//        Az::$app->market->reports2->dailyReportSKd();
//        Az::$app->office->juroshPdfMerge->mergePdfsFromArrayTest();


//        $shop_option_branches = collect(ShopOptionBranch::find()->asArray()->all());
//        $core_option_types = collect(ShopOptionType::find()->asArray()->all());
//
//        $core_categories = collect(ShopCategory::find()->asArray()->all());
//        $core_brands = collect(ShopBrand::find()->asArray()->all());
//        $core_companies = collect(UserCompany::find()->asArray()->all());
//        $test = collect(Test::find()->asArray()->all());
//        echo 'count='.$test->count().'/n';


//        $startTime = microtime(true);
//        if ( !$this->cacheExists('OneDayCache'))
//            $this->cacheSet('OneDayCache', time());
//
//        $timestamp = $this->cacheGet('OneDayCache');
//        $day = 24*60*60;
//
//        if ( $timestamp + $day < time() )
//            $this->cacheFlush();
//
//        if (!$this->cacheExists('ShopOptionBranchCache'))
//            $this->cacheSet('ShopOptionBranchCache', collect(ShopOptionBranch::find()->asArray()->all()));
//
//        if (!$this->cacheExists('ShopOptionTypeCache'))
//            $this->cacheSet('ShopOptionTypeCache', collect(ShopOptionType::find()->asArray()->all()));
//
//        if (!$this->cacheExists('ShopCategoryCache'))
//            $this->cacheSet('ShopCategoryCache', collect(ShopCategory::find()->asArray()->all()));
//
//        if (!$this->cacheExists('ShopBrandCache'))
//            $this->cacheSet('ShopBrandCache', collect(ShopBrand::find()->asArray()->all()));
//
//        if (!$this->cacheExists('UserCompanyCache'))
//            $this->cacheSet('UserCompanyCache', collect(UserCompany::find()->asArray()->all()));
//
//        if (!$this->cacheExists('Testcache'))
//            $this->cacheSet('Testchache', collect(UserCompany::find()->asArray()->all()));
//
//        $shop_option_branches =   $this->cacheGet('ShopOptionBranchCache');
//        $core_option_types    =   $this->cacheGet('ShopOptionTypeCache');
//        $core_categories      =   $this->cacheGet('ShopCategoryCache');
//        $core_brands          =   $this->cacheGet('ShopBrandCache');
//        $core_companies       =   $this->cacheGet('UserCompanyCache');
//        $test                 =   $this->cacheGet('Testcache');
//
//
//        $endtime = microtime(true);
//        $diff = $endtime - $startTime;
//        echo 'difference = '.$diff;


//        if ( !$this->cacheExists('OneDayCache'))
//            $this->cacheSet('OneDayCache', time());
//        else{
//            $timestamp = $this->cacheGet('OneDayCache');
//            $day = 24*60*60;
//            if ( $timestamp + $day < time() )
//                $this->cacheFlush();
//            else{
//                $this->core_options = collect(ShopOption::find()->asArray()->all());
//
//                if (!$this->cacheExists('ShopOptionCache'))
//                    $this->cacheSet('ShopOptionCache', collect(ShopOptionBranch::find()->asArray()->all()));
//
//                $this->shop_option_branches = $this->cacheGet('ShopOptionCache');
//            }
//
//        }

//
//        Az::$app->market->element->saveElementsTest();
//        Az::$app->tests->bahodirTest->tekshirish();
//        echo Az::$app->sms->eskiz->getTokenTest();
//        Az::$app->sms->eskiz->sendSmsTest();
//        Az::$app->tests->bahodirTest->dailyreport();
//        $date = '2020-08-14';
//        $model = collect(WareEnterItem::findBySql("SELECT * FROM ware_enter_item WHERE created_at < '$date'::date + '1 day'::interval;")->all());
//
//        $result = [];
//        $array = [];
//        foreach ($model as $key => $item) {
//            if (isset($array[$item['shop_element_id']][$item['best_before']])){
//                $result[$array[$item['shop_element_id']][$item['best_before']]]->before_amount += $item['amount'];
//                if ($item['created_at'] === date('YYYY-m-d')){
//                    $result[$array[$item['shop_element_id']][$item['best_before']]]->enter_amount += $item['amount'];
//                }
//            }else {
//                $array[$item['shop_element_id']][$item['best_before']] = $key;
//                $form = new ShopDailyReportForm();
//                $form->name = ShopCatalog::findOne(['shop_element_id' => $item['shop_element_id']])->name;
//                $form->best_before = $item['best_before'];
//                $form->before_amount = $item['amount'];
//                if ($item['created_at'] === date('YYYY-m-d')){
//                    $form->enter_amount = $item['amount'];
//                }
//                $result[] = $form;
//            }
//        }
//        vdd($result[0]->name);


//        Az::$app->payer->paysys->testPreparePayment();

//        Az::$app->office->officeConvert->exampleOne();

//      Az::$app->office->wordpdf->execute = true;
//        Az::$app->office->wordpdf->contract(1385);
//        Az::$app->office->wordpdf->universalDocumentTest();
//        Az::$app->office->wordpdf->banderol(429);
//        Az::$app->office->wordpdf->multiBanderol(1321);
//        Az::$app->office->wordpdf->multiBanderol(1353);
//        Az::$app->office->wordpdf->multiGenerateActTest();
//        Az::$app->office->wordpdf->routeList(141);
//        Az::$app->office->wordpdf->contractDoub(909);

        //  Az::$app->office->PhpWord->test();
        // Az::$app->office->wordpdf->doc_pdf(Root . '\upload\excelz\eyuf\mergedfile-MergeFiles-19598.docx');
//        $model = new DynaMulti();
//        $model = $model::find()
        //Az::$app->office->wordpdf->doc_pdf('D:\test.docx');
        //Az::$app->office->wordpdf->multiGenerateAct([1]);
//            ->where(['filter' => ['value' => '0']])
//            ->all();
//
        //   Az::$app->office->libreOffice->docx_rtf('D:/test.docx');
        //  Az::$app->office->openOffice->doc_pdf('D:\test.docx');
//        vdd($model);
//
//Az::$app->office->wordShahzod->multiGenerateAct([98]);


       // $this->widata();
       // $this->teee();
//        Az::$app->tests->bahodirTest->tekshirish();
//        Az::$app->payer->paysysnewbahodir->mytest();

//        Az::$app->utility->telegramAsync->sendTelegram('280253273:AAG5oiNEFPvTpy8LdnX4RPL1reeZCVx4uKM','-1001176048898','test25');
       // Az::$app->office->openOffice->docPdfTest();

//        Az::$app->payer->paysysnewbahodir->test();


//        $login = 'admin';
//        $password = 'Production';
//        $url = 'http://10.10.3.60/admin/config.php';
//
//        $extlist = ['1984','1985'];
//
//        $i = new Driver(['headless' => true]);
//        $url = '/';
//        $i->openPage($url);
//        echo $i->getAttributeValueByXpath('//*[@id="langPick"]','class');
//        echo "The title is '" . $i->getTitle() . "'\n";
//        $i->click('#login_admin');
//        echo "The title is '" . $i->getTitle() . "'\n";
//        sleep(1);
//        $i->fillField('#ui-id-1 #loginform .form-group input[name=username]', $value = $login); // login type
//        $i->fillField('#ui-id-1 #loginform .form-group input[name=password]', $value = $password); //password type
//        sleep(1);
//        $i->click('.ui-dialog-buttonset button.ui-button.ui-corner-all.ui-widget:first-child');  // submit
//        sleep(1);
//
//        $i->clickByXpath('//*[@id="fpbx-menu-collapse"]/ul/li[2]/a'); // Applications click
//        sleep(1);
//        $i->clickByXpath('//a[@href="config.php?display=extensions"]'); // Applications->Extensions click
//        sleep(1);
//
//        for ($k = 0; $k < count($extlist); $k++) {
//            $i->fillFieldXpath('//*[@id="alldids"]/div[1]/div[1]/div[3]/input',''); //clear in search input
//            sleep(1);
//            $i->fillFieldXpath('//*[@id="alldids"]/div[1]/div[1]/div[3]/input',$extlist[$k]); //type in search input
//            sleep(1);
//            $i->clickByXpath('//*[@id="table-all"]/tbody/tr/td[11]/a[2]'); // delete button click
//            sleep(1);
//            $i->acceptAlert(); // alert ok click
//            sleep(1);
//        }
//
//        $i->clickByXpath('//*[@id="button_reload"]'); // Apply Config click
//        $i->moveMouseCursor('.fa-sign-in-alt');
//        $i->click('.fa-sign-in-alt');
//        $i->addCookie('today','it is rainy');
//        echo "cookie was added \n";
//        echo $i->getCookie('today')."\n";
//        $i->deleteAllCookies();
//        $i->gotolink('http://facebook.com');
//        $url = 'http://facebook.com/';
//        $i->openPage($url);
//        echo "The title is '" . $i->getTitle() . "'\n";
//        $i->back();
//        echo "The title is '" . $i->getTitle() . "'\n";
//        $i->forward();

    }


}
