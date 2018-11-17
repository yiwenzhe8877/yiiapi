<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * DateUtils: 2018/11/2
 * Time: 10:23
 */

namespace app\modules\v1\factory;


class MemberBaseFactory extends BaseFactory
{
    public $form_map = [

        'memberbase.add'=>'app\modules\v1\forms\member\base\AddForm',
        'memberbase.delete'=>'app\modules\v1\forms\member\base\DeleteForm',
        'memberbase.update'=>'app\modules\v1\forms\member\base\UpdateForm',
        'memberbase.getlist'=>'app\modules\v1\forms\member\base\GetListForm',
        'memberbase.getall'=>'app\modules\v1\forms\member\base\GetAllForm',
        'memberbase.changepassword'=>'app\modules\v1\forms\member\base\ChangePasswordForm',
        'memberbase.changeriches'=>'app\modules\v1\forms\member\base\ChangeRichesForm',

    ];


}