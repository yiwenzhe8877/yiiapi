<?php

namespace app\modules\v2\factory\admin;

use app\modules\v2\factory\BaseFactory;

class UserFactory extends BaseFactory
{
    public $form_map = [
        'adminuser.delete'=>'app\modules\v2\forms\admin\user\DeleteForm',
        'adminuser.add'=>'app\modules\v2\forms\admin\user\AddForm',
        'adminuser.login'=>'app\modules\v2\forms\admin\user\LoginForm',
        'adminuser.logout'=>'app\modules\v2\forms\admin\user\LogoutForm',
        'adminuser.getone'=>'app\modules\v2\forms\admin\user\GetOneForm',
        'adminuser.getadmin'=>'app\modules\v2\forms\admin\user\GetAdminForm',
        'adminuser.getlist'=>'app\modules\v2\forms\admin\user\GetListForm',
        'adminuser.update'=>'app\modules\v2\forms\admin\user\UpdateForm',
        'adminuser.changepassword'=>'app\modules\v2\forms\admin\user\ChangePasswordForm',

    ];

   
}