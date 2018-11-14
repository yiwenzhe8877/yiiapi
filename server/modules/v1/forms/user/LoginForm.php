<?php

namespace app\modules\v1\forms\user;


use app\models\AdminUser;
use app\modules\v1\utils\ApiException;
use yii\base\Model;
use app\modules\v1\forms\CommonForm;

class LoginForm extends CommonForm
{
    public $username;
    public $password;

    private $_user;




    public function addRule(){
        return [
            ['username','required','message'=>'用户名不能为空'],
            ['password','required','message'=>'密码不能为空'],
            ['username', 'exist','targetClass' => '\app\models\AdminUser', 'message' => '用户不存在'],
            [['password'],'checkpwd','skipOnEmpty' => false, 'skipOnError' => false,'params'=>['wrong_pwd'=>"密码错误"]],
            [['username'],'checkstatus','skipOnEmpty' => false, 'skipOnError' => false,'params'=>['wrong_status'=>"用户被禁用",'del'=>'用户被删除']],
        ];
    }


    // 检测密码
    public function checkpwd($attribute, $params)
    {

        $user=AdminUser::findOne(['username'=>$this->username,'password'=>md5($this->password.\Yii::$app->params['salt'])]);

        if(!$user){
            ApiException::run($params['wrong_pwd'],"900001");
        }
        $this->_user=$user;
        return true;
    }

    // 检测
    public function checkstatus()
    {

        $user=AdminUser::findOne(['username'=>$this->username,'status'=>0]);

        if($user){
            ApiException::run("用户被禁用","900001");
        }
        $user=AdminUser::findOne(['username'=>$this->username,'del'=>1]);

        if($user){
            ApiException::run("用户被删除","900001");
        }

        return true;
    }


    //登录
    public function run($form){



        if(YII_DEBUG){

            $auth_key="bdegkortvwxyABDIKMQRSTUWYZ023456";

        }else{
            $auth_key=getRandom();

            AdminUser::updateAll([
                'auth_key'=>$auth_key
            ],[
                'username'=>$form->username
            ]);
        }

        return ['accessToken'=>$auth_key];
    }

}