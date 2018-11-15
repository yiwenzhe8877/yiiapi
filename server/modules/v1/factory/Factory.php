<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * Date: 2018/11/2
 * Time: 10:22
 */

namespace app\modules\v1\factory;


use app\componments\utils\ApiException;

class Factory
{
    static public $SERVICE_MAP =[
        //后台管理
        'user.delete'=>'app\modules\v1\factory\UserFactory',
        'user.add'=>'app\modules\v1\factory\UserFactory',
        'user.update'=>'app\modules\v1\factory\UserFactory',
        'user.getlist'=>'app\modules\v1\factory\UserFactory',
        'user.getone'=>'app\modules\v1\factory\UserFactory',
        'user.getadmin'=>'app\modules\v1\factory\UserFactory',
        'user.changepassword'=>'app\modules\v1\factory\UserFactory',
        'user.login'=>'app\modules\v1\factory\UserFactory',
        'user.logout'=>'app\modules\v1\factory\UserFactory',
        //后台管理组
        'group.delete'=>'app\modules\v1\factory\GroupFactory',
        'group.add'=>'app\modules\v1\factory\GroupFactory',
        'group.update'=>'app\modules\v1\factory\GroupFactory',
        'group.getlist'=>'app\modules\v1\factory\GroupFactory',
        'group.getall'=>'app\modules\v1\factory\GroupFactory',
        //权限
        'auth.delete'=>'app\modules\v1\factory\AuthFactory',
        'auth.add'=>'app\modules\v1\factory\AuthFactory',
        'auth.update'=>'app\modules\v1\factory\AuthFactory',
        'auth.getlist'=>'app\modules\v1\factory\AuthFactory',
        'auth.getall'=>'app\modules\v1\factory\AuthFactory',
        'auth.setgroupauth'=>'app\modules\v1\factory\AuthFactory',
        'auth.syncgroupauth'=>'app\modules\v1\factory\AuthFactory',
        'auth.getgroupauthlist'=>'app\modules\v1\factory\AuthFactory',
        //菜单
        'menu.delete'=>'app\modules\v1\factory\MenuFactory',
        'menu.add'=>'app\modules\v1\factory\MenuFactory',
        'menu.update'=>'app\modules\v1\factory\MenuFactory',
        'menu.getlist'=>'app\modules\v1\factory\MenuFactory',
        'menu.getall'=>'app\modules\v1\factory\MenuFactory',
        'menu.syncgroupmenu'=>'app\modules\v1\factory\MenuFactory',
        'menu.setgroupmenu'=>'app\modules\v1\factory\MenuFactory',
        'menu.getmenugrouprelation'=>'app\modules\v1\factory\MenuFactory',

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