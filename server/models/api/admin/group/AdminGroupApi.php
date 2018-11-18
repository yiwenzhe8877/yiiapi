<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/18
 * Time: 11:45
 */

namespace app\models\api\admin\group;


use app\models\admin\group;

class AdminGroupApi
{

    public static function getDefaultGroupId(){
                return self::getDefaultGroup()->group_id;
    }
    public static function getDefaultGroupName(){
        return self::getDefaultGroup()->group_name;
    }

    private static function getDefaultGroup(){
        return group::find()->where(['is_default'=>1])->one();
    }

}