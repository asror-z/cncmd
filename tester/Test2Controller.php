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
use Monolog\Logger;
use PetrKnap\Php\Profiler\Profile;
use PetrKnap\Php\Profiler\SimpleProfiler;
use Symfony\Component\Finder\Finder;
use zetsoft\cnweb\eyuf\admin\ShopShipmentController;
use zetsoft\dbdata\wdg\WidgetData;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\former\shop\shopSizeForm;
use zetsoft\former\test\TestLaptopForm;
use zetsoft\models\dyna\DynaMulti;
use zetsoft\models\page\PageAction;
use zetsoft\models\shop\ShopBrand;
use zetsoft\models\shop\ShopCatalog;
use zetsoft\models\place\PlaceCountry;
use zetsoft\models\shop\ShopElement;
use zetsoft\models\core\CoreInput;
use zetsoft\models\menu\MenuImage;
use zetsoft\models\shop\ShopOptionType;
use zetsoft\models\shop\ShopOrder;
use zetsoft\models\shop\ShopProduct;
use zetsoft\models\core\CoreSetting;
use zetsoft\models\shop\ShopShipment;
use zetsoft\models\user\User;
use zetsoft\models\ALL\Test;
use zetsoft\models\App\eyuf\EyufScholar;
use zetsoft\models\test\Test3;
use zetsoft\models\uzcrm\Test4;
use zetsoft\service\smart\Fake;
use zetsoft\service\utility\Monolog;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\control\ZControlRest;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\former\ZMultiWidget;
use zetsoft\widgets\incores\ZMCheckboxGroupWidget2;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSliderIonWidget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\menus\ZMmenuWidget;
use zetsoft\widgets\navigat\ZGAccordionWidget;
use function Dash\Curry\all;

class Test2Controller extends ZControlCmd
{

    public $asd;

    public function actionRun()
    {
        Az::$app->acme->acmeCoreZoir->addSSL('eyuf.zetsoft.uz', 'eyuf', false);
       /*
        vd(App);
        sleep(1);
        vdd(App);
        exit;

        /*Az::$app->tests->keldiyortest1->chiqar();*/
        ///   Az::$app->acme->test->test();
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
       /* Az::$app->office->officetopdf->docPdf('D:/test.docx');*/
       // Az::$app->office->openOffice->docPdfTest();
    }


    public function teee()
    {


        $model = PlaceCountry::findOne(35);

        //  $model->columns();
        vd($model->id);
        vd($model->columns['alpha3']->widget);


        $models = PlaceCountry::find()
            ->where([
                'id' => [
                    18,
                    36
                ]
            ])
            ->all();

        foreach ($models as $model) {

            vd($model->id);
            vd($model->columns['alpha3']->widget);
        }

        //  $model->columns();


        /*   $model = new ShopOrder();
           $model->systemColumns = 111;

           $object = clone $model;
           $object2 = clone $model;
           $object3 = clone $model;
           $object4 = clone $model;

           $data = $model::find($model)
               ->limit(3)
               ->all();

           foreach ($data as $item) {
               vdd($item);
           }*/

//        vdd($data);


        /*     $model = new LaptopForm();
             $col1 = $model->columns;

             $app = $model->allApp();
             $model2 = Az::$app->forms->former->model($app);
             $col2 = $model2->columns;
             vdd();*/

    }
    public function widata()
    {


        //  $model->columns();


           $model = new ShopOrder();
           $model->systemColumn = 111;

           $object = clone $model;
           $object2 = clone $model;
           $object3 = clone $model;
           $object4 = clone $model;

           $data = $model::find($model)
               ->limit(3)
               ->all();

           foreach ($data as $item) {
               vd($item->systemColumn);
           }

//        vdd($data);


             $model = new TestLaptopForm();
             $col1 = $model->columns;

             $app = $model->allApp();
             $model2 = Az::$app->forms->former->model($app);
             $col2 = $model2->columns;
             vd($model2->systemColumn);

    }

    public function tee()
    {
        $model = new DynaMulti();
        $model = $model::find()
            ->where(['filter' => 'null'])
            ->all();
    }

    /* for ($i = 0; $i < 1000; $i++)
         file_put_contents("c:/test/$i.txt", "$i");*/
    //Az::$app->calls->fillCdr->run();

//        Az::$app->office->wordShahzod->cashTemplateTest(31);
    public function old()
    {

        //Az::$app->inputs->depend->getWaresByUserCompany();
        // Az::$app->market->order->saveOrders();
        // Az::$app->market->Address->getAddress();
        /** @var Zview $this */
        //Az::$app->market->wares->test();

    }

    public function fileapp()
    {


        $model = new User();
        /*$model->configs->nameOn = [
            "name'
        ];*/

        /*        $model->configs->titles = [
                    'email' => 'wdfds'
                ];*/

        $model->configs->replace = [
            'email' => function (FormDb $column) {

                $column->index = true;
                $column->title = Az::l('E-sadfasdfasdf');
                $column->dbType = dbTypeString;
                $column->rules = [
                    [
                        validatorEmail,
                    ],
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                    [
                        validatorUnique,
                    ],
                ];

                return $column;
            },
        ];

        $model->columns();

        $email = $model->columns['email']->title;

        vdd($email);

    }


    private function filterFormItems2()
    {

        $optionTypes = ShopOptionType::find()->all();


        foreach ($optionTypes as $optionType) {

        }


    }

    public function deleteFile()
    {
        Az::$app->acme->fileinput->key = 'img2.jpg';
        Az::$app->acme->fileinput->id = 1;
        Az::$app->acme->fileinput->modelClassName = 'CoreInput';
        Az::$app->acme->fileinput->attribute = 'jsonb_4';
        Az::$app->acme->fileinput->delete();
    }

    public function uploadFile()
    {
        Az::$app->acme->fileinput->key = 'img2.jpg';
        Az::$app->acme->fileinput->id = 1;
        Az::$app->acme->fileinput->modelClassName = 'CoreInput';
        Az::$app->acme->fileinput->attribute = 'jsonb_4';
        Az::$app->acme->fileinput->delete();
    }

    public function relate()
    {


        /** @var ZActiveRecord $model */
        $model = Test3::findOne(7);
        $model->configs->rules = [
            [
                validatorSafe
            ]
        ];
        $this->modelSave($model);


        //Az::$app->forms->modelz->relatedSave($model);
    }


    public function testD()
    {
        $this->cores->appPage->clone_module('test', 'eyuf/admin');
    }

    public function checkingDb()
    {


    }

    public function box($targetPath, $pharName, $desPath, $rootPath)
    {

        $src = (new Finder())
            ->files()
            ->ignoreVCS(true)
            ->name('*.php')
            ->in($targetPath);

        $builder = (new Builder($pharName . '.phar', $desPath, $rootPath))
            ->addFinder($src)
            ->addFile($targetPath)
            ->build() // file that contains the "index" code of your app
        ;
    }


    public function db()
    {

        $app = new ConfigDB();

        $vars = get_object_vars($app);

        $needs = [
            'name',
            'dbase',
            'lang',
            'addBy',
            'addID',
            'edit',

            'title',
            'icon',
            'order',
            'genName',
            'makeInsert',
            'makeMenu',
            'extraConfig',
            'extraBlock',
            'relationWidth',
            'relationBtn',
        ];


        $return['class'] = function (FormDb $column) {
            $column->title = 'Название класса';
            return $column;
        };

        foreach ($vars as $key => $var) {

            $widget = ZHInputWidget::class;

            switch (true) {

                case (is_array($var)):
                    $widget = ZKSelect2Widget::class;
                    break;

                case (is_bool($var)):
                    $widget = ZKSwitchInputWidget::class;
                    break;

            }

            $titles = FormDb::labels();

            if (ZArrayHelper::isIn($key, $needs))
                $return[$key] = function (FormDb $column) use ($widget, $key, $titles) {

                    $column->title = $titles[$key];
                    $column->widget = $widget;

                    return $column;
                };
        }

        return $return;

    }


    public function ajax()
    {

        $q = $this->httpGet('q');
        $out = ['results' => ['email' => '', 'text' => '']];
        $data = EyufScholar::find()
            ->select('id, name AS text')
            ->asArray()
            ->where(['LIKE', 'name', $q])
            ->all();

        foreach ($data as $key => $scholars) {

            vdd($scholars);

            $datas[$key]['id'] = $key;
            $datas[$key]['children'] = $key;

        }

        $out['results'] = $data;

        return $out;
    }


    private function langs()
    {
        Az::$app->language = 'en';
        echo Az::l('Типы организаций');
        $var = Az::l('{0}', [
            'Типы организаций'
        ]);

        echo $var;
    }

    public function dir()
    {
        $dir = Root . '/process/Accordeon/';

        $this->folder($dir);
    }


    public function test()
    {
        $file = Root . '/process/Menu/Microsoft Products Inspired Tab Navigation Based On Bootstrap 4 _ Free jQuery Plugins.mhtml';

        $this->file($file);
    }


    public $root = 't:/PHP/Projects/zetsoft/process/';

    private function git()
    {


        $folders = ZFileHelper::findDirectories($this->root, [
            'recursive' => false
        ]);

        foreach ($folders as $folder) {
            $folder = ZFileHelper::normalizePath($folder);
            $this->folder($folder);
        }


    }


    private function folder($folder)
    {
        $files = ZFileHelper::findFiles($folder, [
            'recursive' => false
        ]);

        foreach ($files as $file) {
            $this->file($file);
        }

    }

    private function file($file)
    {
        if (!file_exists($file))
            return Az::warning($file, 'File Not exists');


        Az::debug($file, 'Now Processing');


        /**
         *
         * Process Text
         */
        $text = file_get_contents($file);
        $text = str_replace(array('=' . PHP_EOL, '3D'), '', $text);


        /**
         *
         * Get Links
         */

        $this->linkMain = $this->snapshot($text);
        Az::debug($this->linkMain, 'Main Link');

        $github = $this->github($text);

        if (empty($github))
            return true;

        $this->linkGithub = $github['github'];

        if (ZStringHelper::find($this->linkGithub, '"'))
            return true;

        $this->author = $github['author'];
        $this->library = $github['library'];

        Az::debug($github, 'Github');


        if (empty($this->library))
            return false;

        $this->linkDemo = $this->demo($text);
        Az::debug($this->linkDemo, 'Demo Link');


        /**
         *
         * Create Folder
         */
        $this->folder = dirname($file);

        $this->folder .= '/' . $this->author . ' ' . $this->library;

        ZFileHelper::createDirectory($this->folder);
        Az::debug($this->folder, 'Created Folder');

        //  $this->url($this->linkMain);
        $this->url($this->linkGithub);
        $this->url($this->linkDemo);


        $this->url("https://yarnpkg.com/en/packages?q=$this->library");
        $this->url("https://yarnpkg.com/en/package/$this->library");
        $this->url("https://asset-packagist.org/package/search?query=$this->library&platform=bower%2Cnpm");

        /**
         *
         * Move file
         */

        if (!$this->rename)
            return false;

        $filename = bname($file);
        $newname = "$this->folder/$filename";
        rename($file, $newname);

        return true;

    }

    private function url($link)
    {

        if (empty($link))
            return false;

        $search = [
            'www.',
            'search?q=',
            '/',
            '\\',
            '?',
            ':',
        ];

        $name = str_replace($search, ' ', $link);

        $search = [
            '#',
            'https',
            'http',
            '.html',
            '.htm',
            '.aspx',
            '.asp',
        ];


        $name = str_replace($search, '', $name);
        $name = trim($name);

        $urlFile = "$this->folder/$name.url";

        $text = strtr($this->sample, [
            '{url}' => $link
        ]);

        if (file_put_contents($urlFile, $text))
            Az::debug($urlFile, 'Written');
        else
            Az::warning($urlFile, 'Not Written');

        return false;
    }


    private function snapshot(string $text)
    {

        preg_match_all('/Snapshot-Content-Location: (.*)?/', $text, $return);

        if (empty($return[0]))
            return [];

        $return = ZArrayHelper::getValue($return, '1.0');

        return $return;
    }

    private function github(string $text)
    {

        preg_match_all('/\"(https:\/\/github.com\/(.*?)\/(.*?))\"/', $text, $return);

        if (empty($return[0]))
            return [];

        $github = ZArrayHelper::getValue($return, '1.0');
        $author = ZArrayHelper::getValue($return, '2.0');
        $library = ZArrayHelper::getValue($return, '3.0');

        /*      $author = ZInflector::humanize($author, true);
              $library = ZInflector::humanize($library, true);*/
        $library = str_replace(array('/', '\\'), '', $library);

        return [
            'github' => $github,
            'author' => $author,
            'library' => $library,
        ];
    }


    private function demo(string $text)
    {

        preg_match_all('/\"(https:\/\/www.jqueryscript.net\/asset\/.*?)"/', $text, $return);

        if (empty($return[0]))
            return [];

        $return = ZArrayHelper::getValue($return, '1.0');

        return $return;
    }


}
