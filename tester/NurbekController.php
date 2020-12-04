<?php

/**
 * @author NurbekMakhmudov
 */

namespace zetsoft\cncmd\tester;


require Root . '/vendori/utility/league/vendor/autoload.php';

use Addvilz\Pharaoh\Builder;
use yii\helpers\Url;
use zetsoft\models\ALL\Test;
use zetsoft\models\ALL\Test3;
use zetsoft\models\App\eyuf\Card;
use zetsoft\models\App\eyuf\db2\CallsCdr;
use zetsoft\models\App\eyuf\ScholarTest;
use zetsoft\models\App\eyuf\TreeProduct;
use zetsoft\models\auto\ChatMessage;
use zetsoft\models\dyna\DynaChess;
use zetsoft\models\shop\Product;
use zetsoft\models\shop\ShopOrder;
use zetsoft\models\shop\ShopShipment;
use zetsoft\models\test\TestOrder;
use zetsoft\models\ware\WareAccept;
use zetsoft\service\acme\YaacAcmeTest;
use zetsoft\service\cores\Category;
use zetsoft\service\cores\Subscribe;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZStringHelper;

/**
 * @author NurbekMakhmudov
 * @TODO boshqa odam o'zgartirish kiritmasin
 */
class NurbekController extends ZControlCmd
{

    #region Action Run
    public function actionRun()
    {
        $this->asArrayTest();
    }

    public function unversalReportTest()
    {
        Az::$app->market->reportCourierGood->data();
        Az::$app->market->reportCourierGood->test();
    }



    public function phpExcelImportTest()
    {
        $res = Az::$app->parser->phpExcelImport->excelParserExample();
        vd($res);
    }

    public function whereJsonOrInAndInTest()
    {
        $model = DynaChess::find()->whereJsonIn('rols', 'admin')->all();
        vdd($model);

        $jsonOrIn = '{"a":1, "b":2, "c":3}';
        $arrOrIn = array('b', 'c');

        $res = Az::$app->tests->activeQueryN->whereJsonOrIn($jsonOrIn, $arrOrIn);
        vd($res);

    }


    public function mailsTest()
    {
        $swiftMailer = Az::$app->utility->swiftMailer;
//        $swiftMailer->contentType = Az::$app->utility->swiftMailerNurbek::contentType['plain'];
//        $swiftMailer->isLogger = true;
//        $swiftMailer->isThrottler = true;
//        $swiftMailer->emailLimitOnPerMinute = 1;
        $swiftMailer->verifyWithEmailExample();


//         $res =  Az::$app->utility->swiftMailer->verifyWithEmail('jakh.kudratoff@gmail.com', 'jdfshsgdj');
//        $res =  Az::$app->utility->swiftMailer->verifyWithEmail('nurmax1993@gmail.com', 'jdfshsgdj', true);
//        vd($res);


//        $logPath =  Root. '\render\test\log';

//        echo Az::$app->utility->swiftMailerNurbek->auth('eyufconfirmationemail@gmail.com',
//             '62ffca3230ee975f568a4ed284b9a6115c6c279530ea18c2fb1664f071713dc4');

//         echo Az::$app->utility->swiftMailer->auth('eyufconfirmationemail@gmail.com',
//             '62ffca3230ee975f568a4ed284b9a6115c6c279530ea18c2fb1664f071713dc4');


//        Az::$app->utility->swiftMailer->antiFloodPlugin(100);
//        Az::$app->utility->swiftMailer->count = true;
//         Az::$app->utility->swiftMailer->auth('ketrahamla@nedoz.com', 'MKJHJKugbi');

    }


    public function optimaTest()
    {
//        Az::$app->optima->vokuHtmlMin->example();

//        Az::$app->optima->wyrihaximusHtmlCompress->basicExample();
//        Az::$app->optima->wyrihaximusHtmlCompress->advancedExample();
//
//        Az::$app->optima->tinyHtmlMinifier->simpleExample();
//        Az::$app->optima->tinyHtmlMinifier->exampleMinifierOptions();
    }

    public function slugifyTest()
    {
        Az::$app->slug->vokuUrlify->slugExample();
//        Az::$app->slug->cocurSlugify->slugifyExample();
    }

    public function parserTest()
    {
//        Az::$app->parser->shuchkinSimplexlsxExcelParser->xlsxToArrayExample();
//        Az::$app->parser->shuchkinSimplexlsxExcelParser->xlsxToArrayWithoutHeaderExample();
        Az::$app->parser->shuchkinSimplexlsxExcelParser->xlsxToHtmlTableExample();


//        Az::$app->parser->nathanmacParser->jsonParserExample();
//        Az::$app->parser->nathanmacParser->xmlParserExample();
//        Az::$app->parser->nathanmacParser->queryStringParserExample();
//        Az::$app->parser->nathanmacParser->yamlParserExample();
    }

    public function guidTest()
    {
//        $uuid = "4e52c919-513e-4562-9248-7dd612c6c1ca";  // sample UUID
//        $uuid = "d3f34x2fdsdsfrrc4";
//        $uuid = Az::$app->guid->ramseyUuid->createWithVersion(3);;
        $uuid = Az::$app->guid->ramseyUuid->create();;
        echo "Uuid = " . $uuid;

        $shortUuid = Az::$app->guid->pascaldevinkShortUUID->encodeUuid($uuid);
        echo "\nShortUuid = " . $shortUuid;

        $decodedUuid = Az::$app->guid->pascaldevinkShortUUID->decodeUuid($shortUuid);
        echo "\nDecodedUuid = " . $decodedUuid;

//        echo Az::$app->guid->ramseyUuid->create();
//        echo Az::$app->guid->ramseyUuid->createWithVersion(3);

//        $v = Az::$app->guid->ramseyUuid->getVersion();
//        echo "\nVersion = " . $v;


//        echo Az::$app->guid->sGuid->create();
//        echo Az::$app->guid->sGuid->createLowercase();

    }

    public function compressTest()
    {
        echo Az::$app->optima->marcocesaratoMinifier->example();

        //        $res = Az::$app->parser->nathanmacParser->parseJson($json);
//        print_r($res);
    }

    public function bootFullTest()
    {
        $userModelFullName = $this->bootFull('ShopOrder');
        $newUser = new $userModelFullName();
        foreach ($newUser->attributes as $key => $value) {
            $user = $newUser::find()->all();
            foreach ($user as $us) {
                if ($key === "name") {
                    $i = $us->$key;
                    vd($i);
                }
            }
        }
    }


    /**
     * @todo get method running time
     */
    public function runningTime()
    {
        $boot = new \Boot();
        $boot->start();
        /*$this->testMethodName();*/
        echo $boot->finish();
    }


    public function collectionsTest()
    {
        Az::$app->tests->nurbekCollectionsTest->data();
        Az::$app->tests->nurbekCollectionsTest->averageTest();
    }

    public function activeQueryTest()
    {
        Az::$app->tests->activeQueryNurbek->asArrayTest();
    }

    public function asArrayTest()
    {
        $user = TestOrder::find()->all();
        vd($user);

    }

    public function chessTest()
    {
        Az::$app->cores->chess->createModelTest();
    }

    public function e()
    {
        $jsonSource = '{
                "message": {
                    "author": "Nurbek Makhmudov",
                    "subject": "Parse json to array",
                    "body": "Hello, contact me if you dont know how to use it"
                }
            }';

        $queryStringSource = 'author=Nurbek Makhmudov&subject=Parse Query String to array&body=Hello, contact me if you dont know how to use it';

        $xmlSource = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
                        <xml>
                            <message>
                                <author>Nurbek Makhmudov</author>
					            <subject>Parse XML to array</subject>
					            <body>Hello, contact me if you dont know how to use it</body>
                            </message>
                        </xml>";

        $yamlSource = '
				---
				message:
				    author: "Nurbek Makhmudov"
				    subject: "Parse YAML to array"
				    body: "Hello, contact me if you dont know how to use it"
				';

    }


    public function countClass()
    {
//        $class = 'zetsoft\\service\\cores\\Chess';
//        $class = 'zetsoft\\service\\slug\\CocurSlugify';
//        $class = 'zetsoft\\service\\market\\ReportAcceptanceData';
        $class = 'zetsoft\\service\\market\\ReportAcceptance';

        $reflection = new \ReflectionClass($class);
        $content = file_get_contents($reflection->getFileName());
        $content = strtr($content, [
            ' ' => ''
        ]);

        $count = 0;
        $lines = explode("\r\n", $content);
        $bool = false;
        $excludes = [
            '{',
            '}',
            ''
        ];

        $isComment = false;
        foreach ($lines as $line) {


            if (ZStringHelper::startsWith($line, 'class')) {
                $bool = true;
                continue;
            }

            if (!$bool)
                continue;

            if (ZArrayHelper::isIn($line, $excludes))
                continue;

            if (ZStringHelper::startsWith($line, '//'))
                continue;

            if (ZStringHelper::endsWith($line, '/*')) {
                $isComment = true;
                continue;
            }

            if (ZStringHelper::startsWith($line, '*/')) {
                $isComment = false;
                continue;
            }

            if ($isComment)
                continue;

            $count++;
        }

        vdd($count);
    }


}
