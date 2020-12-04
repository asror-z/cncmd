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


use Facebook\WebDriver\Exception\UnsupportedOperationException;
use League\Flysystem\FileNotFoundException;
use PhpOffice\PhpSpreadsheet\Shared\OLE\PPS\Root;
use PHPUnit\Util\Exception;
use Swift_Message;
use yii\data\ActiveDataProvider;
use zetsoft\dbdata\eyuf\OperatorData;
use zetsoft\dbitem\chat\FriendItem;
use zetsoft\former\eyuf\EyufProgramForm;
use zetsoft\former\place\PlaceRegion;
use zetsoft\models\App\eyuf\EyufScholar;
use zetsoft\models\calls\CallsAdmin;
use zetsoft\models\cpas\CpasLead;
use zetsoft\models\cpas\CpasOffer;
use zetsoft\models\cpas\CpasStream;
use zetsoft\models\cpas\CpasStreamItem;
use zetsoft\models\menu\Menu;
use zetsoft\models\page\PageAction;
use zetsoft\models\page\PageView;
use zetsoft\models\page\PageViewType;
use zetsoft\models\pays\PaysPayment;
use zetsoft\models\place\PlaceAdress;
use zetsoft\models\place\PlaceCountry;
use zetsoft\models\shop\ShopCatalog;
use zetsoft\models\shop\ShopCatalogWare;
use zetsoft\models\shop\ShopElement;
use zetsoft\models\shop\ShopOrder;
use zetsoft\models\shop\ShopOrderCopy;
use zetsoft\models\shop\ShopOrderItem;
use zetsoft\models\user\User;
use zetsoft\models\user\UserBlocked;
use zetsoft\models\user\UserFriend;
use zetsoft\models\ware\WareAccept;
use zetsoft\models\ware\WareExitItem;
use zetsoft\models\ware\WareTransItem;
use zetsoft\service\inputs\Fileinput;
use zetsoft\system\actives\ZActiveData;
use zetsoft\system\actives\ZActiveQuery;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\actives\ZArrayData;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;
use zetsoft\system\helpers\ZArrayHelper;
use Detection\MobileDetect;
use Httpful\Request;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\kernels\ZWidget;
use zetsoft\widgets\menus\ZMmenuWidget;
use function Clue\StreamFilter\fun;
use function Dash\Curry\all;
use function foo\func;

class Test4Controller extends ZControlCmd
{

    public function provider()
    {
        $Q = ShopOrder::find();

        $provider = new ZActiveData([
            'query' => $Q
        ]);

        // $provider->prepare();
        $provider->getModels();

        $prov = json_encode($provider);

        $prov = Az::$app->utility->mains->jsonObject(ZActiveData::class, $prov);

        $query = Az::$app->utility->mains->array2object(ZActiveQuery::class, $prov->query);

        $prov->query = $query;
    }

    public function actionRun()
    {

     /*   $aa = \zetsoft\models\place\PlaceRegion::find()->all();

        foreach ($aa as $a) {
            $a->configs->rules = validatorSafe;
            $a->save();
        }*/
        Az::$app->tests->test->testExcel();
    }

    public function testTime()
    {
        Az::$app->cpas->cpasStats->test();
    }

    public function stats()
    {
        $user_id = 341;
        $data = Az::$app->cpas->cpasStats->generateAdminStats($user_id);
        vdd($data);
    }

    private function ravshan()
    {

        $aa = new WareExitItem();

        $aa->shop_catalog_id = 1661;
        $aa->amount = 350;
        $aa->ware_exit_id = 27;
        $this->modelSave($aa);

    }

    public function tesjkdfj()
    {

        //    vdd(Az::$app->cpas->CpasSite->getCountry(1));


        // Az::$app->utility->geocoder->coder();
        //Az::$app->market->reports->test();
        //$model = User::findOne(103);
        //Az::$app->market->operator->beforeSave($model);
        //    $ip = '185.139.137.41';

        //   vdd(Az::$app->geo->geodecoder->test($ip));

        //vdd(Az::$app->market->cpas->test());
        //  $d = Az::$app->office->pandoc->doc_pdf('D:\again.docx');
        /*$data = Az::$app->market->reports2->dailyReportSKd();
        vdd($data);*/
        //  Az::$app->office->docto->doc_pdf('D:/hello.docx');
        //vdd('asdasdas');
        //$this->ravshan();$path=Root . '\upload\excelz\eyuf\mergedfile-MergeFiles-77942.docx';

        // Az::$app->office->wordShahzod->docxConvertToPdf(Root . '\upload\excelz\eyuf\mergedfile-MergeFiles-1258.docx');
        //   Az::$app->office->openOffice->run();
        //  Az::$app->office->tcpdf->test();
        //  Az::$app->office->wordShahzod->multiGenerateAct([1,2]);//mergeFiles->mergeDocsFromArray(['D:\wysiwig.docx']);
        // Az::$app->league->route->test();
        //Az::$app->mobile->mobileDete

        // require(__DIR__ .'/../../../vendor/nategood/httpful/bootstrap.php');
        //   require(__DIR__ .'/../../../vendor/autoload.php');
        //     require(__DIR__ .'/../../../vendor/google/flatbuffers/tests/phpTest.php');

        //Az::$app->office->libreOffice->docx_pdf('D:/test.docx');

        //Az::$app->parser->flatbuffer->test();


//vdd($str);
        // Create the template


        // Make a request to the GitHub API with a custom
// header of "X-Trvial-Header: Just as a demo".


        //$this->shahzod();

    }

    public function save()
    {
        $model = ShopOrder::find()
            ->all();

        foreach ($model as $item) {
            $item->save();
        }

    }


    public function shahzod()
    {
        $items = ShopOrder::find()
            ->select('user_company_ids')
            ->all();

        $arr = [];
        foreach ($items as $item) {

            if (is_array($item->user_company_ids) && $item->user_company_ids !== null) {
                //vdd($item->user_company_ids);
                foreach ($item->user_company_ids as $user_company_id) {
                    $arr[] = (string)$user_company_id;

                }
                vd($item->user_company_ids);
                //vd($arr);
                $item->user_company_ids = $arr;
                $arr = [];
                $item->save();
            }
        }
    }


    public function fake()
    {
        Az::$app->smart->fake->model();
    }

    public function Azimjon()
    {

        vdd($this->sessionGet('compare'));
        //Az::$app->market->product2->inCompare();

    }

    public function Xolmat()
    {
        $model = new User();

        vdd(Az::$app->forms->tabular->generate($model));
    }

    public function operator()
    {
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
                'id' => 8
            ],
            [
                'namee' => 'salom',
                'id' => 8
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
