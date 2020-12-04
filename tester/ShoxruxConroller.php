<?php


namespace zetsoft\cncmd\tester;

use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;


class ShoxruxConroller extends ZControlCmd
{

    public function actionRun()
    {
//        Az::$app->parser->PhpHtmlParser->test();
          Az::$app->potima->htmlCompress->exampleOne();
//        Az::$app->parser->PhpHtmlParser->exampleOne();;
    }
}