<?php

namespace app\modules\v1\controllers;
use app\models\Business;
use app\models\BusinessAccount;
use app\modules\v1\behaviors\business\BusinessBehavior;
use app\modules\v1\behaviors\token\SyncTokenBehavior;
use app\modules\v1\events\business\AfterCreateBusinessEvent;
use app\modules\v1\forms\BusinessAccountForm;
use app\modules\v1\forms\BusinessInfoForm;
use app\modules\v1\forms\BusinessPayConfigForm;
use app\modules\v1\forms\ForgetForm;
use app\modules\v1\forms\RegisterForm;
use app\modules\v1\utils\Constants;
use app\modules\v1\utils\ResponseMap;
use yii\base\UserException;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\filters\VerbFilter;
use yii\httpclient\Client;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UserEvent;

class TokenController extends Controller
{
    public  $map=[
        '管理员登陆'=>['service'=>'user.login','username'=>'admin','password'=>"123123"],
        '管理组分页列表'=>['service'=>'group.getlist','pageNum'=>'1','group_name'=>"超级管理员"],
        '管理组删除'=>['service'=>'group.delete','id'=>'1'],
        '获得全部组信息'=>['service'=>'group.getall'],
        '管理组的添加'=>['service'=>'group.add','group_name'=>'宇宙第一'],
    ];

    public $token='bdegkortvwxyABDIKMQRSTUWYZ023456';
    public $url='http://localhost/server/web/index.php/v1/index/index';

    //需要发送商户帐号和密码来验证
    public function actionTest()
    {
        $url=$this->url;
        $map=$this->map;
        foreach ($map as $k=>$v){

            var_dump($k.'调用服务:'.$v['service'].$this->post($url,$v));
        }

    }

    public function post($url,$post_data){
        $token=$this->token;
        $url.='?token='.$token;
        //初始化
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, $url);
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 0);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //设置post方式提交
        curl_setopt($curl, CURLOPT_POST, 1);
        //设置post数据

        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        //执行命令
        $data = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);


        $d=json_decode($data);
        if($d->code=='000000'){
            return "ok";
        }

        //显示获得的数据
        return $data;
    }

}