<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/16
 * Time: 21:54
 */
namespace app\models\api\member\group;

use app\componments\sql\SqlGet;
use app\models\MemberGroup;

class MemberGroupApi
{
    //获得默认用户组
    public static function getDefaultGroup(){

        return MemberGroup::findone(['is_default'=>1]);

    }
}