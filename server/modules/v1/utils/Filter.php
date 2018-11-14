<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * Date: 2018/11/5
 * Time: 13:27
 */

namespace app\modules\v1\utils;


class Filter
{
    public static $sqlinject_map=['delete','script','--','document','javascript'];

    public static function sqlinject($value){
        foreach (self::$sqlinject_map as $k=>$v){
            $value=str_replace($v,'',trim($value));
        }
        return $value;
    }
}