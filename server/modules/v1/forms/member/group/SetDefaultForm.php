<?php

namespace app\modules\v1\forms\member\group;



use app\componments\sql\SqlGet;
use app\componments\sql\SqlUpdate;
use app\models\api\member\group\MemberGroupApi;
use app\models\MemberGroup;
use app\modules\v1\forms\CommonForm;


class SetDefaultForm extends CommonForm
{

    public $group_id;


    public function addRule(){
        return [
            [['group_id'],'required','message'=>'{attribute}不能为空'],
            [['group_id'], 'exist','targetClass' => 'app\models\MemberGroup', 'message' => '用户组不存在'],
        ];
    }



    public function run($form){



        $group=MemberGroupApi::getDefaultGroup();
        MemberGroup::updateAll([
            'is_default'=>0
        ],[
            'group_id'=>$group->group_id
        ]);

        MemberGroup::updateAll([
            'is_default'=>1
        ],[
            'group_id'=>$form->group_id
        ]);

        return "";
    }

}