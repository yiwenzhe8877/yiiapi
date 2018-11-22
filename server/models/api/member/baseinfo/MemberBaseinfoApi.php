<?php
/**
 * Created by PhpStorm.
 * User: idz025
 * Date: 2018/11/22
 * Time: 9:03
 */

namespace app\models\api\member\baseinfo;


use app\componments\utils\Assert;
use app\componments\utils\PwdEncryptUtils;
use app\models\member\baseinfo;

class MemberBaseinfoApi
{
    public static function changePwd($member_id,$password,$password_again){

        Assert::PasswordNotEqual($password,$password_again);
     //   Assert::PwdNotStrong($this->getPassword());

        \Yii::error($password);
        baseinfo::updateAll([
            'password'=>PwdEncryptUtils::encryptLoginPwd($password)
        ],['member_id'=>$member_id]);
        return "";
    }
}