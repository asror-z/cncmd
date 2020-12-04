<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 27.05.2019
 * Time: 14:26
 */

namespace zetsoft\cncmd\cruds;


use Cocur\Slugify\Slugify;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZInflector;
use zetsoft\service\search\SphinxService;

class SphinxController extends ZControlCmd
{

    private $control;

    public $allRes = array();

    public function actionRun()
    {
        Az::start(__FUNCTION__);
        $classes = Az::$app->smart->migra->scan();
        foreach ($classes as $class) {
            $this->control = new SphinxService();
            $basename = bname($class);
            $this->control->name = $basename;
            echo 'Indexing Table ' . $basename . PHP_EOL;
            $this->control->writeRt();
        }
        Az::end();
    }

    public function actionAttach()
    {
        Az::start(__FUNCTION__);
        $classes = Az::$app->smart->migra->scan();
        foreach ($classes as $class) {
            $this->control = new SphinxService();
            $basename = bname($class);
            $this->control->name = $basename;
            echo 'Attaching Table ' . $basename . PHP_EOL;
            $this->control->attachIndex();
        }
        Az::end();
    }


    public function actionSearch()
    {
        Az::start(__FUNCTION__);
        $this->control = new SphinxService();
        $classes = Az::$app->smart->migra->scan();
        foreach ($classes as $class) {
            $basename = bname($class);
            $this->control->name = $basename;
            $this->control->search = 'Козловa';
            $this->control->search1();
            $this->allRes[$basename] = $this->control->result;
        }
        Az::end();
    }

}
