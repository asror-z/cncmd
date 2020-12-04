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


use zetsoft\dbdata\eyuf\OperatorData;
use zetsoft\dbitem\chat\FriendItem;
use zetsoft\models\page\PageAction;
use zetsoft\models\shop\ShopOrder;
use zetsoft\models\shop\ShopProduct;
use zetsoft\models\user\UserBlocked;
use zetsoft\models\user\UserFriend;
use zetsoft\models\menu\Menu;
use zetsoft\models\core\CoreMenuNew;
use zetsoft\models\auto\ChatMessage;
use zetsoft\models\auto\ChatNotify;
use zetsoft\models\user\User;
use zetsoft\models\App\eyuf\category;
use zetsoft\models\App\eyuf\EyufScholar;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZArrayHelper;

class Test13Controller extends ZControlCmd
{
    public function actionRun()
    {

        Az::$app->tests->nodirbektest->example();

    }

    public function fake(){
        Az::$app->smart->fake->model();
    }

    public function Azimjon () {
                           
        vdd($this->sessionGet('compare'));
        //Az::$app->market->product2->inCompare();

    }

    public function Xolmat(){
        $model = new User();

        vdd(Az::$app->forms->tabular->generate($model));
    }

    public function operator(){
        $operator = new OperatorData();
        vdd($operator->lang());
    }

    public function address()
    {
        vdd(Az::$app->cores->address->getAddressForCheckOut(59));
    }

    public function fakerModel()
    {
        $a = [
            [
                'namee' => 'salom',
                'id' =>  8
            ],
            [
                'namee' => 'salom',
                'id' =>  8
            ]
        ];

        $a = collect($a);
        vdd($a->where('id', 8)->where('namee', 'salom1'));

        ///Az::$app->smart->fake->model();
    }

    public function faker()
    {
        vdd(Az::$app->faker->autocomplete->getall());
    }

    public function faker2()
    {
        $fake = Az::$app->faker->autocomplete->getall();
        echo $fake['city'];
    }


    public function price()
    {
        echo Az::$app->cores->company->getPriceString();
    }


    public function jblack()
    {
        //$a = Az::$app->market->product->allProducts();
        $mail = Az::$app->tests->swift;

        $mail->to = 'nshaxrizod@mail.ru';
        $mail->subject = 'Heee';

        $mail->body = '<html>' .
            ' <body>' .
            'Please click <a href="' . '/cores/auth/verify.aspx?code=it is code' . '&user=123' . '">this link</a> to verify your account' .
            ' </body>' .
            '</html>';
        $mail->body_extension = 'text/html';
        echo $mail->log;
        $mail->run();

//        $a =Az::$app->tests->swift;
//        $a->to='nshaxrizod@mail.ru';
//        $a->subject='J@xong!r';
//        $a->attachfile=Root.'/upload/google.png';
//        $a->embedfile=Root.'/upload/google.png';
//        $a->embedimage();
//        $a->body='<html>' .
//            ' <body>' .
//            '  Here is an image <img src="' . $a->embed . '" alt="Image" />' .
//            '  Rest of message' .
//            ' </body>' .
//            '</html>';
//        $a->body_extension='text/html';
//
//        $a->logger=true;
//        $a->run();
//        echo $a->log;
//        return $mail;
    }

    public function sd()
    {
        Az::debug("bet", 'application');
        Az::debug("bet.zetsoft.uz", 'domain');

//        Az::$app->smart->adder2->create("bet");
//        Az::$app->smart->adder2->addDomainNameIntoHosts("bet.zetsoft.uz");
//        Az::$app->smart->adder2->updateNgnix("bet", "bet.zetsoft.uz");
        Az::$app->acme->acmecore->addSSL("bet.zetsoft.uz", "bet");

//        Az::$app->smart->adder2->remove("bet");

    }

    public function getMenu($per)
    {
        $menu = Menu::find()
            ->select('json')
            ->where(['id' => $per])
            ->all();

        // vdd($menu[0]->json);

        foreach ($menu[0]->json as $key => $val) {

            $aska = PageAction::find()
                ->select(['name'])
                ->where(['id' => $val[paramAction]])
                ->asArray()
                ->one();

            $class['class'] = $val['class'];
            $role['role'] = $val['role'];
            $arr[$key]['icon'] = $val['icon'];
            $arr[$key]['role'] = $val['role'];
            $arr[$key]['text'] = $val['text'];
            $arr[$key]['class'] = $val['class'];
            $arr[$key][paramAction] = $aska['name'];
            $arr[$key]['target'] = $val['target'];

        }

        $menuNew = CoreMenuNew::findOne($per);
        $menuNew->json = $arr;
        $menuNew->save();

        vdd(1);
    }

    public function messages()
    {
        $mess = ChatMessage::findOne(1446);
        $mess->read = true;
        $mess->save();
        return ['save'];
    }

    public function actionSendmessage()
    {

        $message = new ChatMessage();
        $message->sender = 399;
        $message->receiver = 221;
        $message->read = false;
        $message->time = date('h:i');
        $message->text = '<img src="/render/images/assets/image/hand.gif" class="img-fluid">';
        $message->save();
        vdd($message->attributes);
    }

    public function actionAddfriend()
    {
        $request = new UserFriend();
        $request->person = 387;
        $request->friend = 288;
        $request->status = 0;
        $request->remove = false;
        $request->save();
        return ['addFriend'];
    }

    public function ActionNotifyremove($id)
    {
        $mess = ChatNotify::findOne($id);
        $mess->remove = true;
        $mess->save();
        return ['remove'];
    }


    public function getFriendItem()
    {


        $requests = UserFriend::find()
            ->where([
                'friend' => 288,
                //'status' => 0
            ])
            ->all();

        $users = User::find()
            ->indexBy('id')
            ->all();


        $data = [];

        foreach ($requests as $request) {

            /** @var User $user */

            $user = ZArrayHelper::getValue($users, 288);
            $img = $user->userPhoto();

            $item = new FriendItem();
            $item->person = $request->person;
            $item->id = $request->id;
            $item->friend = $request->friend;
            $item->status = $request->status;
            $item->time = $request->time;
            $item->photo = $img;

            $data[] = $item;
        }
        vdd($data);


    }


    public function viewAll()
    {
        $notifies = ChatNotify::find()
            ->where(['read' => false])
            ->limit(20)
            ->all();

        foreach ($notifies as $notify) {
            $notify->read = true;
            $notify->save();
        }


        vdd($notifies);
    }


    public function getNotify()
    {
        $notifies = ChatNotify::find()
            ->select('read')
            ->where([
                'user_id' => $this->userIdentity()->id,
                //'read' => true,
            ])
            ->orWhere([
                'user_id' => -1
            ])
            ->limit(20)
            ->asArray()
            ->all();


        $users = User::find()
            ->indexBy('id')
            ->all();

        vdd($notifies);
    }


    public function UserPhoto()
    {
        vdd(Az::$app->utility->notify->notifies());
    }

    public function getBadge()
    {
        $notifies = ChatNotify::find()
            ->where([
                'user_id' => 70,
                'read' => false,
            ])
            ->orWhere([
                'user_id' => -1
            ])
            ->count();

        vdd($notifies);
    }

    public function menuMenu()
    {

        $menus = Menu::find()
            ->select('title,json')
            ->all();


        foreach ($menus as $menu) {
            $menuTitle[] = $menu['title'];

        }


    }


    public function chat()
    {
        $model = UserBlocked::find()
            ->where(['and',
                ['person' => 50],
                ['blocked' => 33]
            ]);

        return $model;

    }

    public function join()
    {

        /* $documents = DocumentType::find()
                  ->leftJoin('document', 'document_type.id = document.eyuf_document_type_id' )
                  ->asArray()
                  ->all();

         vdd($documents);*/

        /**
         *
         * $query = new Query;
         * $query    ->select([
         * 'tbl_user.username AS name',
         * 'tbl_category.categoryname as  Category',
         * 'tbl_document.documentname']
         * )
         * ->from('tbl_user')
         * ->join('LEFT OUTER JOIN', 'tbl_category',
         * 'tbl_category.createdby =tbl_user.userid')
         * ->join('LEFT OUTER JOIN', 'tbl_document',
         * 'tbl_category.cid =tbl_document.did')
         * ->LIMIT(5)    ;
         *
         * $command = $query->createCommand();
         * $data = $command->queryAll();
         *
         */

        /*$query = new Query;
            $query ->select([
                'document_type.name',
                'document.eyuf_scholar_id'
            ])
            ->from('document_type')
        ->join('LEFT OUTER JOIN', 'document', 'document_type.id = document.eyuf_document_type_id')
        ->limit(5);
     $command = $query->createCommand();
     $data = $command->queryAll();

     vdd($data);*/

        /*$query = DocumentType::find()
                   ->select('name')
                   ->asArray()
                   ->all();

        vdd($query);*/

        /*$customers = DocumentType::find()

            ->leftJoin('document', 'document.eyuf_document_type_id = document_type.id')
            ->where(['document.eyuf_scholar_id' => 72])
            ->all();
        vdd($customers);*/

        /* $titles = Yii::$app->db->createCommand('SELECT * FROM document_type LEFT JOIN document on document_type.id = document.eyuf_document_type_id where document.eyuf_document_type_id is null')
             ->queryColumn();
         vdd($titles);*/
        $user = User::find()
            ->select('id, name')
            ->where(['like', 'name', 's'])
            ->andWhere('id<74')
            ->orderBy('name ASC')
            ->asArray()
            ->all();
        vdd($user);


    }

    public function word()
    {
        $allScholar = EyufScholar::find()->all();
        foreach ($allScholar as $scholar) {
            $return[] = [
                'name' => $scholar->name,
                'title' => $scholar->title,
                'birthDate' => $scholar->birthdate,
                'addres' => $scholar->address,
                'position' => $scholar->position,
                'program' => $scholar->program,
                'user' => $scholar->user_id,
            ];
        }

        vdd($return);


    }

    public function notify()
    {
        $notify = ChatNotify::find()
            ->count();
        vdd($notify);
    }

}








/*public function actionRun()
   {
          $this->base();
   }*/
/*public function base()
{
    $cor = User::find()->where(['id'=>69])->asArray()->all();
    print_r($cor);

    $cor = User::find()->where(['like','title','user'])->asArray();
    print_r($cor);

    $cor = User::find()->select(['id','name','password'])->andWhere('id<60')->asArray()->all();
    print_r($cor);

    $cor = User::find()->where(['id','name'])->limit(6)->asArray();
    print_r($cor);

    $cor = User::find()->select(['id','name','password'])->limit(6)->offset(1)->asArray()->all();
    print_r($cor);

    $cor = User::find()->count();
    print_r($cor);
}*/
