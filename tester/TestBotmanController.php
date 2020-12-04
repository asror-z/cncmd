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

use zetsoft\dbitem\chat\BotmanItem;
use zetsoft\service\bot\TgBotman;
use zetsoft\system\control\ZControlCmd;


class TestBotmanController extends ZControlCmd
{
    public function actionRun()
    {
        $bot = new TgBotman();
        $bot = $bot->botman('1210680423:AAGqATmg4p3tqKpl1eoyd0wUR2gjJQxdU2k');

        $item = new BotmanItem();
        $item->id = 1;
        $item->type = $bot::TYPES['command'];
        $item->text = '/salom';
        $items[] = $item;

        $item = new BotmanItem();
        $item->id = 2;
        $item->parent_id = 1;
        $item->type = $bot::TYPES['reply'];
        $item->text = 'yaxshi';
        $items[] = $item;

        $bot->load($items);
    }
}
