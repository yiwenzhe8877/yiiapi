<?php

namespace app\modules\v1\forms\user;


use app\models\AdminGroup;
use app\models\AdminUser;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\model\UpdateService;
use app\modules\v1\service\sql\AddOrUpdateService;
use app\modules\v1\utils\ApiException;

class UpdateForm extends CommonForm
{
    public $id;

    public $nickname;
    public $phone;
    public $group_name;
    public $status;
    public $del;



    public function rules()
    {
        $result=parent::getRules(FORM_CLASS);


        return array_merge($result,$this->addRule());
    }

    public function addRule(){
        return [
            ['id','required','message'=>'id不能为空'],
            ['nickname','required','message'=>'昵称不能为空'],
            ['phone','required','message'=>'手机号不能为空'],
            ['group_name','required','message'=>'管理组不能为空'],
            ['status','required','message'=>'状态标志不能为空'],
            ['del','required','message'=>'删除标志不能为空'],
        ];
    }




    public function run($form){
        $model=AdminUser::find()->where(['=','user_id',$form->id])->one();


        if(!$model){
            ApiException::run("用户id不存在",'900001',__CLASS__,__METHOD__,__LINE__);
        }

        $group=AdminGroup::find()->where(['=','group_name',$form->group_name])->one();
        if(!$group){
            ApiException::run("用户组不存在",'900001',__CLASS__,__METHOD__,__LINE__);
        }



        if(!YII_DEBUG){

            UpdateService::run('user',$form->id,'id',$form);
        }



        return "";
    }


}