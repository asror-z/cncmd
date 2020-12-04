<?php
/**
 * Created by PhpStorm.
 * Created by: Xolmat Ravshanov
 * Date: 27.05.2019
 * Time: 14:26
 */

namespace zetsoft\cncmd\caller;

use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class ReactAmiController extends ZControlCmd
{
    public $data;
    public $appId;
    public $domain;
    public $rootDir;
    public $newName;
    public $oldName;


    public function options($actionID)
    {
        return array_merge(parent::options($actionID), [
            'app', 'oldName', 'domain'
        ]);
    }

    /**
     * creates new application
     * php excmd\ALL\asrorz.php cruds/adder/create $app $domain
     * Function  actionCreate
     * @param $app - application name - string [0, 5]
     * @param $domain - example.test
     */
    public function actionRun()
    {
         $calls =  Az::$app->calls->autoDial->callAgent1();
         Az::$app->calls->reactAmi->originate11($calls);
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
        /*Az::$app->smart->adder->app = $this->app;
        Az::$app->smart->adder->oldName = $this->oldName;
        Az::$app->smart->adder->domain = $this->domain;
        Az::debug($this->oldName, 'application to clone');
        Az::debug($this->app, 'new application name');
        Az::$app->smart->adder->clone();*/

        Az::debug($this->newName, 'requesting for SSL certificates');
        Az::$app->acme->acmecore->addSSL($this->newName, 'zetsoft.uz');

        /*$domains = ['zetsoft.uz', 'zoft.uz', 'backup.uz', 'history.uz'];
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
    public function actionExtract($app)
    {
        //php excmd\ALL\asrorz.php cruds/adder/extract app
        Az::debug($app, 'application');
        Az::debug("D:/Develop/Projects/ALL/asrorz/extract", 'new location');
        Az::$app->smart->adder->extract($app);
        Az::$app->smart->adder->updateNginxAfterExtract($app);

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
