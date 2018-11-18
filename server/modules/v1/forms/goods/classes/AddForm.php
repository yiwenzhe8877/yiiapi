<?php

namespace app\modules\v1\forms\goods\category;


use app\componments\utils\ApiException;
use app\models\AdminGroup;
use app\models\user;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\model\AddService;

class AddForm extends CommonForm
{

    public $username;
    public $password;
    public $nickname;
    public $phone;
    public $group_name;
    public $status;
    public $del;


        
    public function addRule(){
        return [
            [['username','password','nickname','phone','group_name','status','del'],'required','message'=>'{attribute}不能为空'],
        ];
    }


    public function run($form){
        $model=user::find()
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
        AddService::run('adminUser',$form,$postwhere,$otherdata);

        return "";

    }


}