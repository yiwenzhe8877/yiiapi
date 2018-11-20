<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/17
 * Time: 19:53
 */

namespace app\models\api\member\base;


use app\componments\utils\Assert;
use app\models\member\baseinfo;


class GetMemberInfoApi
{
    public static function getNameById($member_id){
        Assert::RecordNotExist('member_base',['member_id='=>$member_id]);

        return baseinfo::findOne($member_id)->pam_account;

    }

}