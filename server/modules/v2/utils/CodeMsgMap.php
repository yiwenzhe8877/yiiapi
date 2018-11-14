<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * Date: 2018/10/27
 * Time: 9:40
 */

namespace app\modules\v1\utils;


class CodeMsgMap
{
    protected static $map = [
        'del=0'=>'未删除',
        'del=1'=>'已删除',
        'status=1'=>'开启',
        'status=0'=>'关闭'
    ];

    public static function Map($field,$value)
    {
        $item=$field.'='.$value;
        if(!array_key_exists($item,self::$map))
        {
            ApiException::run("字段-文本映射不存在","900001");
        }

        return self::$map[$item];
    }
}