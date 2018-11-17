<?php


namespace app\modules\v1\factory;


use app\componments\utils\ApiException;

class Factory
{
    static public $SERVICE_MAP =[
        //后台管理
        'adminuser.delete'=>'app\modules\v1\factory\AdminUserFactory',
        'adminuser.add'=>'app\modules\v1\factory\AdminUserFactory',
        'adminuser.update'=>'app\modules\v1\factory\AdminUserFactory',
        'adminuser.getlist'=>'app\modules\v1\factory\AdminUserFactory',
        'adminuser.getone'=>'app\modules\v1\factory\AdminUserFactory',
        'adminuser.getadmin'=>'app\modules\v1\factory\AdminUserFactory',
        'adminuser.changepassword'=>'app\modules\v1\factory\AdminUserFactory',
        'adminuser.login'=>'app\modules\v1\factory\AdminUserFactory',
        'adminuser.logout'=>'app\modules\v1\factory\AdminUserFactory',
        //后台管理组
        'admingroup.delete'=>'app\modules\v1\factory\AdminGroupFactory',
        'admingroup.add'=>'app\modules\v1\factory\AdminGroupFactory',
        'admingroup.update'=>'app\modules\v1\factory\AdminGroupFactory',
        'admingroup.getlist'=>'app\modules\v1\factory\AdminGroupFactory',
        'admingroup.getall'=>'app\modules\v1\factory\AdminGroupFactory',
        //权限
        'adminauth.delete'=>'app\modules\v1\factory\AdminAuthFactory',
        'adminauth.add'=>'app\modules\v1\factory\AdminAuthFactory',
        'adminauth.update'=>'app\modules\v1\factory\AdminAuthFactory',
        'adminauth.getlist'=>'app\modules\v1\factory\AdminAuthFactory',
        'adminauth.getall'=>'app\modules\v1\factory\AdminAuthFactory',
        'adminauth.setgroupauth'=>'app\modules\v1\factory\AdminAuthFactory',
        'adminauth.syncgroupauth'=>'app\modules\v1\factory\AdminAuthFactory',
        'adminauth.getgroupauthlist'=>'app\modules\v1\factory\AdminAuthFactory',
        //菜单
        'adminmenu.delete'=>'app\modules\v1\factory\AdminMenuFactory',
        'adminmenu.add'=>'app\modules\v1\factory\AdminMenuFactory',
        'adminmenu.update'=>'app\modules\v1\factory\AdminMenuFactory',
        'adminmenu.getlist'=>'app\modules\v1\factory\AdminMenuFactory',
        'adminmenu.getall'=>'app\modules\v1\factory\AdminMenuFactory',
        'adminmenu.syncgroupmenu'=>'app\modules\v1\factory\AdminMenuFactory',
        'adminmenu.setgroupmenu'=>'app\modules\v1\factory\AdminMenuFactory',
        'adminmenu.getmenugrouprelation'=>'app\modules\v1\factory\AdminMenuFactory',

        //后台客户
        'memberbase.delete'=>'app\modules\v1\factory\MemberBaseFactory',
        'memberbase.add'=>'app\modules\v1\factory\MemberBaseFactory',
        'memberbase.update'=>'app\modules\v1\factory\MemberBaseFactory',
        'memberbase.getlist'=>'app\modules\v1\factory\MemberBaseFactory',
        'memberbase.getall'=>'app\modules\v1\factory\MemberBaseFactory',
        'memberbase.changepassword'=>'app\modules\v1\factory\MemberBaseFactory',
        'memberbase.changeriches'=>'app\modules\v1\factory\MemberBaseFactory',
        
        //后台客户组
        'memberadmingroup.delete'=>'app\modules\v1\factory\MemberAdminGroupFactory',
        'memberadmingroup.add'=>'app\modules\v1\factory\MemberAdminGroupFactory',
        'memberadmingroup.update'=>'app\modules\v1\factory\MemberAdminGroupFactory',
        'memberadmingroup.getlist'=>'app\modules\v1\factory\MemberAdminGroupFactory',
        'memberadmingroup.getall'=>'app\modules\v1\factory\MemberAdminGroupFactory',
        'memberadmingroup.changepassword'=>'app\modules\v1\factory\MemberAdminGroupFactory',
        'memberadmingroup.changeriches'=>'app\modules\v1\factory\MemberAdminGroupFactory',
        'memberadmingroup.setdefault'=>'app\modules\v1\factory\MemberAdminGroupFactory',
        'memberaddress.add'=>'app\modules\v1\factory\MemberAddressFactory',
        'memberaddress.getall'=>'app\modules\v1\factory\MemberAddressFactory',
        'memberaddress.getlist'=>'app\modules\v1\factory\MemberAddressFactory',
        'memberaddress.update'=>'app\modules\v1\factory\MemberAddressFactory',
        //会员消息
        'membermsg.add'=>'app\modules\v1\factory\MemberMsgFactory',
        'membermsg.update'=>'app\modules\v1\factory\MemberMsgFactory',
        'membermsg.getlist'=>'app\modules\v1\factory\MemberMsgFactory',
        'membermsg.getall'=>'app\modules\v1\factory\MemberMsgFactory',
        'membermsg.setread'=>'app\modules\v1\factory\MemberMsgFactory',
        //商品
        'goodscategory.add'=>'app\modules\v1\factory\goodsCategoryFactory',
        'goodscategory.update'=>'app\modules\v1\factory\goodsCategoryFactory',
        'goodscategory.getlist'=>'app\modules\v1\factory\goodsCategoryFactory',
        'goodscategory.getall'=>'app\modules\v1\factory\goodsCategoryFactory',

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