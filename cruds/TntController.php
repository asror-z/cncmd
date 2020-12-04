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
use zetsoft\service\search\TntSearchService;

class TntController extends ZControlCmd
{

    private $control;

    public $allRes = array();

    public function actionRun()
    {
        Az::start(__FUNCTION__);
             Az::$app->search->tntSearchService->run();
        Az::end();
    }


    public function actionSearch()
    {
        Az::start(__FUNCTION__);
        $classes = Az::$app->smart->migra->scan();
        foreach ($classes as $class) {
            $this->control = new TntSearchService();
            $basename = bname($class);
            $this->control->name = $basename;
            $this->control->shouldHave = 'Козловa';
            $this->control->shouldNotHave = 'inessa';
            $this->control->search();
            $this->allRes[$basename] = $this->control->res;
            var_dump($this->allRes);
        }
        Az::end();
    }

    public function actionDelete()
    {
        Az::start(__FUNCTION__);
        $this->control = new TntSearchService();
        $classes = Az::$app->smart->migra->scan();
        foreach ($classes as $class) {
            $basename = bname($class);
            $this->control->name = $basename;
            $this->control->deleteIndex();
        }
        Az::end();
    }

}
