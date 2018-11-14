<?php

namespace app\modules\v1\forms\group;


use app\models\AdminGroup;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\auth\AuthService;
use app\modules\v1\service\model\AddService;
use app\modules\v1\utils\ApiException;

class AddForm extends CommonForm
{
    public $group_name;





    public function addRule(){
        return [
            ['group_name','required','message'=>'管理组名称不能为空'],
        ];
    }




    public function run($form){

        $model=AdminGroup::find()
            ->andWhere(['=','group_name',$form->group_name])
            ->one();

        if($model){
            ApiException::run("管理组名称已经存在",'900001');
        }



        $otherdata=[
            'status'=>1,
            'del'=>0,
        ];
        AddService::run('admingroup',$form,[],$otherdata);



        //同步到groupauth

        AuthService::sync();

        return "";

    }





}