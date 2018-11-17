<?php

namespace app\modules\v1\forms\admin\auth;


use app\models\AdminAuth;
use app\models\AdminGroup;
use app\models\AdminUser;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\model\UpdateService;

use app\componments\utils\ApiException;

class UpdateForm extends CommonForm
{
    public $id;
    public $name;
    public $module;
    public $controller;
    public $action;
    public $sort;
    public $status;
    public $del;


    public function addRule(){
        return [
            ['name','required','message'=>'名称不能为空'],
            ['module','required','message'=>'模块名不能为空'],
            ['controller','required','message'=>'控制器不能为空'],
            ['action','required','message'=>'方法名不能为空'],
            ['sort','required','message'=>'排序不能为空'],
            ['status','required','message'=>'状态不能为空'],
            ['del','required','message'=>'删除不能为空'],
        ];
    }


    public function run($form){



        $model=AdminAuth::find()
            ->andwhere(['!=','auth_id',$form->id])
            ->andwhere(['=','name',$form->name])
            ->all();


        if($model){
            ApiException::run("权限名称已经存在",'900001',__CLASS__,__METHOD__,__LINE__);
        }

        $model=AdminAuth::find()
            ->andwhere(['!=','auth_id',$form->id])
            ->andwhere(['=','module',$form->module])
            ->andwhere(['=','controller',$form->controller])
            ->andwhere(['=','action',$form->action])
            ->one();

        if($model){
            ApiException::run("模块-控制器-方法已经存在",'900001',__CLASS__,__METHOD__,__LINE__);
        }
        
        $model=AdminAuth::findOne($form->id);

        if(!$model){
            ApiException::run("权限id不存在",'900001',__CLASS__,__METHOD__,__LINE__);
        }



        UpdateService::run('auth',$form->id,'id',$form);


        return "";
    }


}