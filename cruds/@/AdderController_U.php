<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 27.05.2019
 * Time: 14:26
 */

namespace zetsoft\cncmd\cruds;

use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class AdderController_U extends ZControlCmd
{
    public $data;
    public $appId;
    public $domain;
    public $rootDir;
    public $app;
    public $oldName;
    public $path;


    public function options($actionID)
    {
        return array_merge(parent::options($actionID), [
            'app',
            'oldName',
            'domain',
            'path'
        ]);
    }

    /**
     * creates new application
     * php excmd\ALL\asrorz.php cruds/adder/create $app $domain
     * Function  actionCreate
     * @param $app - application name - string [0, 5]
     * @param $domain - example.test
     */
    public function actionCreate()
    {
        /*Az::$app->smart->adder->app = $this->app;
        Az::$app->smart->adder->oldName = $this->oldName;
        Az::$app->smart->adder->domain = $this->domain;
        Az::$app->smart->adder->create();*/

//        Az::debug($app, 'requesting for SSL certificates');
//        Az::$app->acme->acmecore->addSSL($domain, $app);

    }

    /**
     * creates new application by id
     * php excmd\ALL\asrorz.php cruds/adder/create $app $domain
     * Function  actionCreate
     * @param $app - application name - string [0, 5]
     * @param $domain - example.test
     */
    public function actionCreateById()
    {
//        Az::$app->smart->adder->createById($id);

//        Az::debug($app, 'requesting for SSL certificates');
//        Az::$app->acme->acmecore->addSSL($domain, $app);

    }

    /**
     * Clones an application
     * php excmd\ALL\asrorz.php cruds/adder/clone $app $newApp $domain
     * Function  actionClone
     * @param $app - application name to clone
     * @param $newApp - new application name - string [0, 5]
     * @param $domain - example.test
     */
    public function actionClone()
    {
        Az::$app->smart->adder->appName = $this->app;
        Az::$app->smart->adder->theme = $this->oldName;
        Az::debug($this->oldName, 'application to clone');
        Az::debug($this->app, 'new application name');
        Az::$app->smart->adder->appClone();

        /*  Az::debug($this->app, 'requesting for SSL certificates');
          Az::$app->acme->acmecore->addSSL($this->app, 'zetsoft.uz');

          $domains = ['zetsoft.uz', 'zoft.uz', 'backup.uz', 'history.uz'];
          foreach ($domains as $domain) {
              Az::$app->acme->yaacacme->addSSL($this->app, $domain);
          }*/
    }

    /**
     * Extracts an application
     * php excmd\ALL\asrorz.php cruds/adder/extract $app $destination (absolute_path)
     * Function  actionExtract
     * @param $app
     * @param $destination
     */
    public function actionExtract()
    {
        //php excmd\ALL\asrorz.php cruds/adder/extract app
        // Az::debug($app, 'application');
        //  Az::debug("D:/Develop/Projects/ALL/asrorz/extract", 'new location');
        Az::$app->smart->adder->appName = $this->app;
        // Az::$app->smart->adder->extract_path = $this->path;

        Az::$app->smart->adder->extract();
        //Az::$app->smart->adder->updateNginxAfterExtract($app);

    }

    /**
     * removes new application files
     * php excmd\ALL\asrorz.php cruds/adder/remove $app $domain
     * Function  actionCreate
     * @param $app - application name to remove
     * @param $domain - example.test
     */
    public function actionRemoveToRecycle($app, $domain = null)
    {
        Az::$app->smart->adder->newName = $app;
        Az::$app->smart->adder->removeToRecycle($app);

    }

}
