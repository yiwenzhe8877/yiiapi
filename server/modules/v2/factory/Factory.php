<?php
/**
 * Created by PhpStorm.
 * adminUser: idz025
 * DateUtils: 2018/11/2
 * Time: 10:22
 */

namespace app\modules\v2\factory;


use app\componments\utils\ApiException;

class Factory
{
    static public $SERVICE_MAP =[

        'memberbaseinfo.xcxadd'=>'app\modules\v2\factory\member\BaseinfoFactory',
        'memberbaseinfo.xcxdecrptunionid'=>'app\modules\v2\factory\member\BaseinfoFactory',

    ];


    //创建相应的支付服务实例
    public static function createInstance($service)
    {
        //判断是否存在这个服务
        if(!array_key_exists($service,self::$SERVICE_MAP))
        {
            ApiException::run("该服务不存在",'100010');
        }

        $clazz = self::$SERVICE_MAP[$service];
        return new $clazz();
    }
}