<?php
/**
 *
 * Author:  Asror Zakirov
 * Created: 29.06.2016 19:06
 * https://www.linkedin.com/in/asror-zakirov-166961a9
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 */

namespace zetsoft\cncmd\tester;

use zetsoft\models\App\eyuf\db3\CxpanelUsers;
use zetsoft\models\App\eyuf\db3\Devices;
use zetsoft\models\App\eyuf\db3\Sip;
use zetsoft\models\App\eyuf\db3\Users;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;


class Test6Controller extends ZControlCmd
{


    public function actionRun(){

        Az::$app->market->stats->getSoldOrderSum();

    }


    public function old()
    {
        Az::$app->market->stats->getClientOrderSum();

    }

    public function something()
    {

        /*$number  = new AutoDialItem();

        $number->client = '935495433';

        $number->operator =  '600' ;

        $number->order_id = '12' ;

        $res =  Az::$app->calls->marceAMI->originate($number);

        vdd($res);*/

    }

   

    public function test()
    {



//        $number = '8600060921090842';
//        $expire = '0399';
//        $amount = 100;
//        $token = Az::$app->payer->payme->create($number, $expire, $amount);
//        Az::$app->payer->payme->checkCard($token);
        /*
            * Methods for the client side of the merchant application:
            *
            *
           $number = '8600060921090842';
           $expire = '0399';
           $amount = 100;

           $token = Az::$app->payer->payme->create($number, $expire, $amount);


           Az::$app->payer->payme->getVerifyCode($token);
           $code = "666666";

           vdd(Az::$app->payer->payme->verify($token, $code));
           */

        /*$number = '8600060921090842';
        $expire = '0399';
        $amount = 100;

        $token = Az::$app->payer->payme->create($number, $expire, $amount);
        
        Az::$app->payer->payme->getVerifyCode($token);
        $code = "666666";

        Az::$app->payer->payme->verify($token, $code);*/

        /*
      
        $amount = 50000;
        $order_id = 106;*/
        $id = "2e0b1bc1f1eb50d487ba268d";
        $phone = "998901304527";

        //Az::$app->payer->payme->payReceipts($token,$phone,$id);
        //vdd(Az::$app->payer->payme->createReceipts($amount,$order_id));
        //Az::$app->payer->payme->removeCard($token);


        //Az::$app->calls->fillCell->run();
        //$res= Az::$app->market->company->getCompanyById(2);
        //Az::$app->geo->extremeIp->getInfoTest();






    }


    public function statsTest($ext)
    {
        $date1 = "00:00 2016/12/1";
        $date2 = "00:00 2020/04/30";
        $date1 = strtotime($date1);
        $date2 = strtotime($date2);

        $date1 = date('d/m/Y H:i:s', $date1);
        $date2 = date('d/m/Y H:i:s', $date2);

        $return = Az::$app->calls->stats->agentCalls($ext, 'ANSWERED', $date1, $date2);

        vdd($return);


    }

    public function checkPass()
    {

        $res = Az::$app->calls->hash->CheckPassword('202', '$08$z29K2ZdM1MjC5sbRPOwc1uXMAZQLdSMOQiCpdq8jYYpi4t5UCwaLy');


        // $res =  Az::$app->calls->fopSocketRun->HashPassword('5555555');


        if ($res)
            vdd($res);
        else
            return false;

        ////Az::$app->sms->eskiz->sendSms('998998113264', 'bos tez');

    }

    public function theme()
    {

        $user = new CxpanelUsers();
        $user->user_id = "123456";
        $user->display_name = "333333";
        $user->peer = "SIP/123456";
        $user->add_extension = "1";
        $user->full = "1";
        $user->add_user = "1";
        $user->hashed_password = "101010";
        $user->initial_password = "101010";
        $user->auto_answer = "1";
        $user->parent_user_id = "123456";
        $user->password_dirty = "0";
        $user->save();

    }


    public function fwconsole()
    {

        $res = Az::$app->calls->fwconsole->run('reload');
        vd($res);

    }

    public function md5un()
    {
        return sha1('$08$GLXrMB7Y6u1PM5eXG.583.P8Alee7OFXN3MNWl7bD.CioQMo/vX8i');
    }


    public function userExample()
    {
        /*
        INSERT INTO users (
            extension, password, name, voicemail, ringtimer, noanswer, recording,
            outboundcid, sipname, noanswer_cid, busy_cid, chanunavail_cid,
            noanswer_dest, busy_dest, chanunavail_dest, mohclass, auditor_exttype
        )

         VALUES (
             '12345',      extension
             '',      password
             'Test'     name
             , 'novm'     voicemail
             , '0',     ringtimer
             '',     noanswer
             '',     recording
             '',     outboundcid
             'test',     sipname
             '',      noanswer_cid
             '',     busy_cid
             '',     chanunavail_cid
             '',      noanswer_dest
             '',      busy_dest
             '',      chanunavail_dest
             'default',     mohclass
             99     auditor_exttype
         );

        */

    }

    public function deviceExample()
    {

        /*
            INSERT INTO devices (
                id, tech, dial, devicetype, user, description, emergency_cid
            )

    VALUES(
                        '12345', id
                        'sip',tech
                        'SIP/12345', dial
                        'fixed',devicetype
                        '12345', user
                        'Test',description
                        '', emergency_cid
                  )

                */
    }


    public function sipExample()
    {
        /*
           INSERT INTO sip (
               id, keyword, data, flags
           )

            VALUES

       ('12345', 'secret', 'supersecret', 2),
       ('12345', 'dtmfmode', 'rfc2833', 3),
       ('12345', 'canreinvite', 'no', 4),
       ('12345', 'context', 'from-internal', 5),
       ('12345', 'host', 'dynamic', 6),
       ('12345', 'trustrpid', 'yes', 7),
       ('12345', 'sendrpid', 'yes', 8),
       ('12345', 'type', 'friend', 9),


       ('12345', 'nat', 'yes', 10),
       ('12345', 'port', '5060', 11),
       ('12345', 'qualify', 'yes', 12),
       ('12345', 'qualifyfreq', '60', 13),
       ('12345', 'transport', 'udp', 14),
       ('12345', 'avpf', 'no', 15),
       ('12345', 'icesupport', 'no', 16),
       ('12345', 'encryption', 'yes', 17),
       ('12345', 'callgroup', '', 18),
       ('12345', 'pickupgroup', '', 19),
       ('12345', 'disallow', '', 20),
       ('12345', 'allow', '', 21),
       ('12345', 'dial', 'SIP/12345', 22),
       ('12345', 'mailbox', '12345@device', 23),
       ('12345', 'deny', '0.0.0.0/0.0.0.0', 24),
       ('12345', 'permit', '0.0.0.0/0.0.0.0', 25),
       ('12345', 'account', '12345', 26),
       ('12345', 'callerid', 'device <12345>', 27)

           */

    }

    public function user()
    {


        $user = new Users();
        $user->extension = '123456';
        $user->password = '123456';
        $user->name = 'Testsss';
        $user->voicemail = 'novm';
        $user->ringtimer = '0';
        $user->noanswer = '';
        $user->recording = '';
        $user->outboundcid = '';
        $user->sipname = 'new add for testing purpose';
        $user->noanswer_cid = '';
        $user->busy_cid = '';
        $user->chanunavail_cid = '';
        $user->noanswer_dest = '';
        $user->busy_dest = '';
        $user->chanunavail_dest = '';
        $user->mohclass = 'default';
        $user->save();

    }

    public function devices()
    {
        $device = new Devices();
        $device->id = '123456';
        $device->tech = 'sip';
        $device->dial = 'SIP/123456';
        $device->devicetype = 'fixed';
        $device->user = '123456';
        $device->description = 'new Extention Testssssss';
        $device->emergency_cid = '';
        $device->save();
    }


    public function sip()
    {
        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'secret';
        $sip->data = '123456';
        $sip->flags = 2;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'dtmfmode';
        $sip->data = 'rfc2833';
        $sip->flags = 3;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'canreinvite';
        $sip->data = 'no';
        $sip->flags = 4;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'context';
        $sip->data = 'from-internal';
        $sip->flags = 5;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'host';
        $sip->data = 'dynamic';
        $sip->flags = 6;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'trustrpid';
        $sip->data = 'yes';
        $sip->flags = 7;
        $sip->save();


        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'sendrpid';
        $sip->data = 'yes';
        $sip->flags = 8;
        $sip->save();


        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'type';
        $sip->data = 'friend';
        $sip->flags = 9;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'nat';
        $sip->data = 'yes';
        $sip->flags = 10;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'port';
        $sip->data = '5060';
        $sip->flags = 11;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'qualify';
        $sip->data = 'yes';
        $sip->flags = 12;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'qualifyfreq';
        $sip->data = '60';
        $sip->flags = 13;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'transport';
        $sip->data = 'udp';
        $sip->flags = 14;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'avpf';
        $sip->data = 'no';
        $sip->flags = 15;
        $sip->save();


        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'icesupport';
        $sip->data = 'no';
        $sip->flags = 16;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'encryption';
        $sip->data = 'yes';
        $sip->flags = 17;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'callgroup';
        $sip->data = '';
        $sip->flags = 18;
        $sip->save();


        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'pickupgroup';
        $sip->data = '';
        $sip->flags = 19;
        $sip->save();


        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'disallow';
        $sip->data = '';
        $sip->flags = 20;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'allow';
        $sip->data = '';
        $sip->flags = 21;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'dial';
        $sip->data = 'SIP/123456';
        $sip->flags = 22;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'mailbox';
        $sip->data = '123456@device';
        $sip->flags = 23;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'deny';
        $sip->data = '0.0.0.0/0.0.0.0';
        $sip->flags = 24;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'permit';
        $sip->data = '0.0.0.0/0.0.0.0';
        $sip->flags = 25;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'account';
        $sip->data = 'account';
        $sip->flags = 26;
        $sip->save();

        $sip = new Sip();
        $sip->id = '123456';
        $sip->keyword = 'callerid';
        $sip->data = 'device <123456>';
        $sip->flags = 27;
        $sip->save();
    }


}
