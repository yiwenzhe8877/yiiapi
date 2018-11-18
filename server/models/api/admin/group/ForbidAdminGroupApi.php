<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/18
 * Time: 11:06
 */
namespace app\models\api\admin\group;

use app\componments\sql\SqlUpdate;
use app\componments\utils\Assert;

class ForbidAdminGroupApi
{
    public static function forbid($group_id){

        Assert::RecordNotExist('admin_group',['group_id='=>$group_id]);

        $obj=new SqlUpdate();
        $obj->setTableName('admin_group');
        $obj->setData(['status'=>0]);
        $obj->setWhere(['group_id='=>$group_id]);
        return $obj->run();

    }

}