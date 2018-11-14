<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * Date: 2018/11/2
 * Time: 10:23
 */

namespace app\modules\v1\factory;


class AuthFactory extends BaseFactory
{
    public $form_map = [
        'auth.delete'=>'app\modules\v1\forms\auth\DeleteForm',
        'auth.add'=>'app\modules\v1\forms\auth\AddForm',
        'auth.getlist'=>'app\modules\v1\forms\auth\GetListForm',
        'auth.update'=>'app\modules\v1\forms\auth\UpdateForm',
        'auth.setgroupauth'=>'app\modules\v1\forms\auth\SetGroupAuthForm',
        'auth.syncgroupauth'=>'app\modules\v1\forms\auth\SyncGroupAuthForm',
        'auth.getgroupauthlist'=>'app\modules\v1\forms\auth\GetGroupAuthListForm',



    ];

    protected $run_map = [
        'auth.delete'=>'app\modules\v1\forms\auth\DeleteForm',
        'auth.add'=>'app\modules\v1\forms\auth\AddForm',
        'auth.getlist'=>'app\modules\v1\forms\auth\GetListForm',
        'auth.update'=>'app\modules\v1\forms\auth\UpdateForm',
        'auth.setgroupauth'=>'app\modules\v1\forms\auth\SetGroupAuthForm',
        'auth.syncgroupauth'=>'app\modules\v1\forms\auth\SyncGroupAuthForm',
        'auth.getgroupauthlist'=>'app\modules\v1\forms\auth\GetGroupAuthListForm',

    ];
}