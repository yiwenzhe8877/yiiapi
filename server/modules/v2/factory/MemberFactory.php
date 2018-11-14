<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * Date: 2018/11/2
 * Time: 10:23
 */

namespace app\modules\v2\factory;


class MemberFactory extends BaseFactory
{
    public $form_map = [
        'member.register'=>'app\modules\v2\forms\Member\RegisterForm',
        'member.login'=>'app\modules\v2\forms\Member\LoginForm',
        'member.forgetpassword'=>'app\modules\v2\forms\Member\ForgetPasswordForm',
        'member.logout'=>'app\modules\v2\forms\Member\LogoutForm',
        'member.getbaseinfo'=>'app\modules\v2\forms\Member\GetBaseInfoForm',
    ];

    protected $run_map = [
        'member.register'=>'app\modules\v2\forms\Member\RegisterForm',
        'member.login'=>'app\modules\v2\forms\Member\LoginForm',
        'member.forgetpassword'=>'app\modules\v2\forms\Member\ForgetPasswordForm',
        'member.logout'=>'app\modules\v2\forms\Member\LogoutForm',
        'member.getbaseinfo'=>'app\modules\v2\forms\Member\GetBaseInfoForm',

    ];
}