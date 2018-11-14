<?php

namespace app\modules\v1\forms\auth;


use app\models\AdminAuth;
use app\models\AdminGroup;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\model\AddService;
use app\modules\v1\utils\ApiException;

class AddForm extends CommonForm
{
    public $name;
    public $module;
    public $controller;
    public $action;



    public function rules()
    {
        return [
            ['name','required','message'=>'权限名称不能为空'],
            ['module','required','message'=>'模块名称不能为空'],
            ['controller','required','message'=>'控制器名称不能为空'],
            ['action','required','message'=>'方法名称不能为空'],
        ];
    }




    public function run($form){

        $model=AdminAuth::find()
            ->andWhere(['=','name',$form->name])
            ->one();

        if($model){
            ApiException::run("权限名称已经存在",'900001');
        }

        $model=AdminAuth::find()
            ->andWhere(['=','module',$form->module])
            ->andWhere(['=','controller',$form->controller])
            ->andWhere(['=','action',$form->action])
            ->one();
        if($model){
            ApiException::run("模块-控制器-方法同时存在",'900001');
        }

        $otherdata=[
            'sort'=>1,
            'status'=>1,
            'del'=>0,
        ];
        AddService::run('auth',$form,[],$otherdata);




        return "";
    }





}