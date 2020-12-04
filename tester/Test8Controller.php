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
use Symfony\Component\Finder\Finder;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\FormDB;
use zetsoft\models\App\eyuf\EyufScholar;
use zetsoft\models\menu\Menu;
use zetsoft\models\shop\ShopCatalog;
use zetsoft\service\cores\Menus;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;

class Test8Controller extends ZControlCmd
{
    /**
     *
     * Function  actionRun
     * @throws \Exception
     */


    public $rename = true;

    private $sample;


    public $folder;

    private $linkMain;
    private $linkDemo;
    private $linkGithub;

    private $author;
    private $library;

    public function wavWan()
    {
//        Az::$app->market->order->renameOrder();

    }

    public function actionRun()
    {

       

        //Az::$app->inputs->depend->getPlaceAdressIdByUserId();
        //Az::$app->cpas->cpasLead->balance();
        Az::$app->market->catalog->renameCatalog();

        //Az::$app->cores->buildWeb->actionScans();

    }

    public function box($targetPath, $pharName, $desPath, $rootPath)
    {

        $src = (new Finder())
            ->files()
            ->ignoreVCS(true)
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


        $return['class'] = static function (FormDB $column) {
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

            $titles = ALLData::labels();

            if (ZArrayHelper::isIn($key, $needs))
                $return[$key] = static function (FormDB $column) use ($widget, $key, $titles) {

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
