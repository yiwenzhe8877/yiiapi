<?php

namespace app\modules\v1\forms\member\group;


use app\componments\sql\SqlCreate;
use app\componments\utils\ApiException;
use app\componments\utils\Ip;
use app\componments\utils\RandomUtils;
use app\models\AdminGroup;
use app\models\user;
use app\models\api\member\group\MemberGroupApi;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\model\AddService;

class AddForm extends CommonForm
{

    public $group_name;


    public function addRule(){
        return [
            [['group_name'],'required','message'=>'{attribute}不能为空'],
            ['group_name', 'unique', 'targetClass' => 'app\models\MemberGroup', 'message' => '{attribute}已经被使用。'],
        ];
    }

    public function run($form){


        $obj=new SqlCreate();
        $obj->setTableName('member_group');
        $obj->setData($form);
        return $obj->run();

    }


}