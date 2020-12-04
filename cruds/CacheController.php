<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\cncmd\cruds;


use zetsoft\service\cores\Cache;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class CacheController extends ZControlCmd
{
    public $type;

    public function options($actionID)
    {
        return array_merge(parent::options($actionID), [
            'type'
        ]);
    }

    public function actionFlushAll()
    {
        Az::start(__FUNCTION__);
        Az::$app->utility->cache->flush();
        Az::$app->cores->cache->flush(Cache::type['file']);
        Az::$app->cores->cache->flush(Cache::type['redis']);
        Az::$app->cores->cache->flush(Cache::type['cache']);
        Az::$app->cores->cache->flush(Cache::type['array']);
        Az::end();
    }

    public function actionFlushCache()
    {
        Az::start(__FUNCTION__);
        Az::$app->cores->cache->flush($this->type);
        Az::end();
    }

    public function actionFlushSchema()
    {
        Az::start(__FUNCTION__);
        Az::$app->utility->cache->flushSchema();
        Az::end();
    }

    public function actionFlush()
    {
        Az::start(__FUNCTION__);
        if (!Az::$app->utility->cache->flush())
            Az::error('Model does not exist ');
        Az::end();
    }

    public function actionFlushOpcache()
    {
        Az::start(__FUNCTION__);
        Az::$app->utility->cache->flushOpcache();
        Az::end();
    }

    public function actionOpcacheConfigs()
    {
        Az::start(__FUNCTION__);
        vd(Az::$app->utility->asset->opcacheConfigs());
        Az::end();
    }

    public function actionAssets()
    {
        Az::$app->utility->assetz->run();
    }
}
