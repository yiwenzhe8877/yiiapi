<?php

namespace app\modules\v1\forms\member\base;



use app\componments\sql\SqlUpdate;
use app\models\AdminGroup;
use app\models\user;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\model\UpdateService;


class UpdateForm extends CommonForm
{


    public $member_id;
    public $group_id;
    public $group_name;



    public function addRule(){
        return [
            [['member_id','group_id','group_name'],'required','message'=>'{attribute}不能为空'],
            [['member_id'], 'exist','targetClass' => 'app\models\MemberBase', 'message' => '用户不存在'],
            [['group_id'], 'exist','targetClass' => 'app\models\MemberGroup', 'message' => '用户组不存在'],
            [['group_name'], 'exist','targetClass' => 'app\models\MemberGroup', 'message' => '用户组名称不存在'],

        ];
    }

    public function run($form){

        $obj=new SqlUpdate();
        $obj->setTableName('member_base');
        $obj->setData($form);
        $obj->setWhere(['member_id='=>$form->member_id]);
        return $obj->run();

    }


}