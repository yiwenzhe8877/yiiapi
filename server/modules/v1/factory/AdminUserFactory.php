<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * DateUtils: 2018/11/2
 * Time: 10:23
 */

namespace app\modules\v1\factory;


class AdminUserFactory extends BaseFactory
{
    public $form_map = [
        'adminuser.delete'=>'app\modules\v1\forms\admin\user\DeleteForm',
        'adminuser.add'=>'app\modules\v1\forms\admin\user\AddForm',
        'adminuser.login'=>'app\modules\v1\forms\admin\user\LoginForm',
        'adminuser.logout'=>'app\modules\v1\forms\admin\user\LogoutForm',
        'adminuser.getone'=>'app\modules\v1\forms\admin\user\GetOneForm',
        'adminuser.getadmin'=>'app\modules\v1\forms\admin\user\GetAdminForm',
        'adminuser.getlist'=>'app\modules\v1\forms\admin\user\GetListForm',
        'adminuser.update'=>'app\modules\v1\forms\admin\user\UpdateForm',
        'adminuser.changepassword'=>'app\modules\v1\forms\admin\user\ChangePasswordForm',


    ];

   
}