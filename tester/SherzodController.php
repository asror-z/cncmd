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


use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;

class SherzodController extends ZControlCmd
{

    public function actionRun()
    {
        //Az::$app->tests->TestSherzod->testing();
        //Az::$app->parser->VokuHtmlMin->example();
        //Az::$app->parser->htmlPurifier->example();
        //Az::$app->parser->vokuHtmlMin->example();
        //        Az::$app->parser->querylist->example();
        //Az::$app->tests->activeQueryNurbek->test();


        //Az::$app->gitapp->Gitlib->example();
        //Az::$app->gitapp->czprojectGitPhp->example();
        //Az::$app->gitapp->cypresslabGitelephant->example();
        //Az::$app->gitapp->cpliakasGitWrapper->example();

        //Az::$app->optima->MarkussomHtmlCompress->example();
        Az::$app->optima->middlewaresMinifier->testMinifier();


    }


}
