<?php

namespace app\modules\v1\forms\admin\auth;


use app\componments\sql\SqlUpdate;
use app\models\admin\auth;
use app\models\AdminAuth;
use app\models\AdminGroup;
use app\models\user;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\model\UpdateService;

use app\componments\utils\ApiException;

class UpdateForm extends CommonForm
{
    public $auth_id;
    public $name;
    public $module;
    public $controller;
    public $action;



    public function addRule(){
        return [
            [['name','module','controller','auth_id','action'],'required','message'=>'{attribute}不能为空'],
            [['auth_id'], 'exist','targetClass' => 'app\models\admin\auth', 'message' => '{attribute}不存在'],
        ];
    }


    public function run($form){

        $data=auth::find()
            ->andWhere(['=','module',$form->module])
            ->andWhere(['=','controller',$form->controller])
            ->andWhere(['=','action',$form->action])
            ->andWhere(['!=','auth_id',$form->auth_id])
            ->one();
        if($data){
             ApiException::run("模块-控制-方法已经存在了",'900001',__CLASS__,__METHOD__,__LINE__);
        }


        $data=auth::find()
            ->andWhere(['=','name',$form->name])
            ->andWhere(['!=','auth_id',$form->auth_id])
            ->one();
        if($data){
            ApiException::run("名称已经存在了",'900001',__CLASS__,__METHOD__,__LINE__);
        }


        $obj=new SqlUpdate();
        $obj->setTableName('admin_auth');
        $obj->setData($form);
        $obj->setWhere(['auth_id='=>$form->auth_id]);
        return $obj->run();


    }


}