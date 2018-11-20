<?php

namespace app\componments\utils;


use yii\base\UserException;
//  ApiException::run(ResponseMap::Map('300001'),'300001',__CLASS__,__METHOD__,__LINE__);
class ResponseMap
{
    protected static $map = [

        //参数类
        '10010001'=>'参数错误',
        '10010002'=>'token缺失',
        '10010003'=>'前端token错误',
        '10010004'=>'中端token错误',
        '10010005'=>'后端token错误',
        '10010006'=>'参数缺失',
        '10010007'=>'参数包含非法字符',
        '10010008'=>'参数为空值',

        //用户类
        '10020001'=>'用户不存在',


        //商户类
        '10030001'=>'商户不存在',

        //管理员类
        '10040001'=>'管理员不存在',

        '10050001'=>'管理员权限已经存在',

        //商品
        '10060001'=>'商品id不存在',

        //子商品
        '10070001'=>'子商品id不存在',

        //订单
        '10080001'=>'订单号不存在',


        //活动
        '10090001'=>'活动不存在',



        '-1'=>'为系统错误',

    ];

    public static function Map($code)
    {
        if(!array_key_exists($code,self::$map))
        {
            throw new UserException("业务码映射不存在","900001");
        }

        return self::$map[$code];
    }
}