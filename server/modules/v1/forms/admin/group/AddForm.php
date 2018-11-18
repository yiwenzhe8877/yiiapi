<?php

namespace app\modules\v1\forms\admin\group;


use app\componments\sql\SqlCreate;
use app\models\AdminGroup;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\auth\AuthService;
use app\modules\v1\service\model\AddService;

use app\componments\utils\ApiException;

class AddForm extends CommonForm
{
    public $group_name;



    public function addRule(){
        return [
            ['group_name','required','message'=>'管理组名称不能为空'],
            ['group_name', 'unique', 'targetClass' => 'app\models\admin\group', 'message' => '{attribute}已经被使用。'],
        ];
    }




    public function run($form){



        $obj=new SqlCreate();
        $obj->setTableName('admin_group');
        $obj->setData($form);
        return $obj->run();



        //同步到groupauth

        AuthService::sync();

        return "";

    }





}