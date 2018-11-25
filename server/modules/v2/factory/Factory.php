<?php


namespace app\modules\v2\factory;


use app\componments\utils\ApiException;

class Factory
{
    static public $SERVICE_MAP =[
        //商户
        'storeuser.login'=>'app\modules\v2\factory\store\UserFactory',
        'storeuser.logout'=>'app\modules\v2\factory\store\UserFactory',

        //菜单
        'storemenu.getrelationmenu'=>'app\modules\v2\factory\store\MenuFactory'

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