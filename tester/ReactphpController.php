<?php

namespace zetsoft\cncmd\tester;


use zetsoft\system\control\ZControlCmd;

class ReactphpController extends ZControlCmd
{
    public function actionRun()
    {
        Az::$app->reacts->childProcess->timer(1, function () {
            echo "after timer";
        });
        Az::$app->reacts->childProcess->runCommand([
            'calc.exe', 'calc.exe'
        ]);
    }
}
