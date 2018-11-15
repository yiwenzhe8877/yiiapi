<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/14
 * Time: 22:01
 */

namespace app\componments\api\sms;


class Sms
{


    //发送
    public static function send($phone,$code,$behavior){
        if(empty($phone)||empty($code)||empty($behavior)){
            return false;
        }

    }

    //验证
    public static function verify($phone,$code,$behavior){
        if(empty($phone)){
            return false;
        }

    }

}