<?php

namespace app\modules\v1\forms\user;


use app\models\AdminGroup;
use app\models\AdminUser;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\model\AddService;
use app\modules\v1\service\sql\AddOrUpdateService;
use app\modules\v1\utils\ApiException;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class AddForm extends CommonForm
{

    public $username;
    public $password;
    public $nickname;
    public $phone;
    public $group_name;
    public $status;
    public $del;


    public function rules()
    {
        return [

            ['username','required','message'=>'用户名不能为空'],
            ['password','required','message'=>'密码不能为空'],
            ['nickname','required','message'=>'昵称不能为空'],
            ['phone','required','message'=>'手机号不能为空'],
            ['group_name','required','message'=>'管理组名称不能为空'],
            ['status','required','message'=>'状态标志不能为空'],
            ['del','required','message'=>'删除标志不能为空'],
        ];
    }


    public function run($form){
        $model=AdminUser::find()
            ->andWhere(['=','username',$form->username])
            ->one();

        if($model){
            ApiException::run("用户名已经存在",'900001');
        }

        $group=AdminGroup::find()
            ->andWhere(['=','group_name',$form->group_name])
            ->one();
        if(!$group){
            ApiException::run("用户组名称不存在",'900001');
        }



        $postwhere=[
            'password'=>md5($form->password.\Yii::$app->params['salt'])
        ];

        $otherdata=[
            'group_id'=>$group->group_id,
            'auth_key'=>getRandom(),
            'del'=>0,
        ];
        AddService::run('user',$form,$postwhere,$otherdata);

        return "";

    }


}