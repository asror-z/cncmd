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

use React\EventLoop\Factory;
use zetsoft\system\control\ZControlCmd;
use function foo\func;

class NewController extends ZControlCmd
{
    public function actionRun()
    {
        $loop = Factory::create();

        $i = 0;
        $k = 0;

        $deferred = new \React\Promise\Deferred();
        $promise = $deferred->promise();

        $loop->addPeriodicTimer(1, function ($timer) use (&$i, $loop, $deferred) {
            echo $i++ . PHP_EOL;
            if ($i > 5) {
                $loop->cancelTimer($timer);
                $deferred->resolve();
            }
        });

        $loop->addPeriodicTimer(1, function ($timer) use (&$k) {
            echo $k++ . PHP_EOL;
        });

        $promise->then(function () {
            echo 'resolve';
        });

        $loop->run();
    }
}
