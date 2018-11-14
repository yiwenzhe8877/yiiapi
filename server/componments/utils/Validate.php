<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/14
 * Time: 20:56
 */

namespace app\componments\utils;


class Validate
{
    public static function run_phone($v){
       return preg_match('/^1[34578]\d{9}$/',$v)==0?false:true;
    }

}