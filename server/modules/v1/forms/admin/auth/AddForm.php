<?php

namespace app\modules\v1\forms\admin\auth;


use app\componments\sql\SqlCreate;
use app\componments\utils\ApiException;
use app\models\admin\auth;
use app\models\AdminAuth;
use app\models\AdminGroup;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\model\AddService;


class AddForm extends CommonForm
{
    public $name;
    public $module;
    public $controller;
    public $action;



    public function addRule(){
        return [
            [['name','module','controller','action'],'required','message'=>'{attribute}不能为空'],
            ['name', 'unique', 'targetClass' => 'app\models\admin\auth', 'message' => '{attribute}已经被使用。'],
        ];
    }



    public function run($form){


        $model=auth::find()
            ->andWhere(['=','module',$form->module])
            ->andWhere(['=','controller',$form->controller])
            ->andWhere(['=','action',$form->action])
            ->one();
        if($model){
            ApiException::run("模块-控制器-方法同时存在",'900001');
        }

        $obj=new SqlCreate();
        $obj->setTableName('admin_auth');
        $obj->setData($form);
        return $obj->run();


    }





}