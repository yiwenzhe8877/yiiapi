<?php

namespace app\modules\v1\forms\admin\user;

use app\componments\sql\SqlUpdate;
use app\componments\utils\Assert;
use app\models\AdminGroup;
use app\models\admin\user;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\model\UpdateService;


class UpdateForm extends CommonForm
{
    public $user_id;

    public $nickname;
    public $phone;
    public $group_name;
    public $status;
    public $del;


    public function addRule(){
        return [
            [['user_id','nickname','phone','group_name','status','del'],'required','message'=>'{attribute}不能为空'],
        ];
    }




    public function run($form){

        Assert::RecordNotExist('admin_user',['user_id='=>$form->user_id]);
        Assert::RecordNotExist('admin_group',['group_name='=>$form->group_name]);


        $obj=new SqlUpdate();
        $obj->setTableName('admin_user');
        $obj->setData($form);
        $obj->setWhere(['user_id='=>$form->user_id]);
        return $obj->run();

    }


}