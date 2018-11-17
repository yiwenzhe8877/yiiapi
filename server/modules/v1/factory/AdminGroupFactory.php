<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * DateUtils: 2018/11/2
 * Time: 10:23
 */

namespace app\modules\v1\factory;


class AdminGroupFactory extends BaseFactory
{
    public $form_map = [
        'admingroup.delete'=>'app\modules\v1\forms\admin\group\DeleteForm',
        'admingroup.add'=>'app\modules\v1\forms\admin\group\AddForm',
        'admingroup.getlist'=>'app\modules\v1\forms\admin\group\GetListForm',
        'admingroup.getall'=>'app\modules\v1\forms\admin\group\GetAllForm',
        'admingroup.update'=>'app\modules\v1\forms\admin\group\UpdateForm',



    ];


}