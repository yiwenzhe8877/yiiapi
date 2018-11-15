<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * DateUtils: 2018/11/2
 * Time: 10:23
 */

namespace app\modules\v1\factory;


class UserFactory extends BaseFactory
{
    public $form_map = [
        'user.delete'=>'app\modules\v1\forms\user\DeleteForm',
        'user.add'=>'app\modules\v1\forms\user\AddForm',
        'user.login'=>'app\modules\v1\forms\user\LoginForm',
        'user.logout'=>'app\modules\v1\forms\user\LogoutForm',
        'user.getone'=>'app\modules\v1\forms\user\GetOneForm',
        'user.getadmin'=>'app\modules\v1\forms\user\GetAdminForm',
        'user.getlist'=>'app\modules\v1\forms\user\GetListForm',
        'user.update'=>'app\modules\v1\forms\user\UpdateForm',
        'user.changepassword'=>'app\modules\v1\forms\user\ChangePasswordForm',


    ];

    protected $run_map = [
        'user.delete'=>'app\modules\v1\forms\user\DeleteForm',
        'user.add'=>'app\modules\v1\forms\user\AddForm',
        'user.login'=>'app\modules\v1\forms\user\LoginForm',
        'user.logout'=>'app\modules\v1\forms\user\LogoutForm',
        'user.getone'=>'app\modules\v1\forms\user\GetOneForm',
        'user.getadmin'=>'app\modules\v1\forms\user\GetAdminForm',
        'user.getlist'=>'app\modules\v1\forms\user\GetListForm',
        'user.update'=>'app\modules\v1\forms\user\UpdateForm',
        'user.changepassword'=>'app\modules\v1\forms\user\ChangePasswordForm',

    ];
}