<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * DateUtils: 2018/11/2
 * Time: 10:22
 */

namespace app\modules\v2\factory;


use app\componments\utils\ApiException;

class Factory
{
    static public $SERVICE_MAP =[
        //会员
        'member.register'=>'app\modules\v2\factory\MemberFactory',
        'member.login'=>'app\modules\v2\factory\MemberFactory',
        'member.forgetpassword'=>'app\modules\v2\factory\MemberFactory',
        'member.logout'=>'app\modules\v2\factory\MemberFactory',
        'member.getbaseinfo'=>'app\modules\v2\factory\MemberFactory',

    ];


    //创建相应的支付服务实例
    public static function createInstance($service)
    {
        //判断是否存在这个服务
        if(!array_key_exists($service,self::$SERVICE_MAP))
        {
            ApiException::run("该服务不存在",'900001');
        }

        $clazz = self::$SERVICE_MAP[$service];
        return new $clazz();
    }
}