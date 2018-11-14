<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * Date: 2018/11/2
 * Time: 10:23
 */

namespace app\modules\v1\factory;


class GroupFactory extends BaseFactory
{
    protected $form_map = [
        'group.delete'=>'app\modules\v1\forms\group\DeleteForm',
        'group.add'=>'app\modules\v1\forms\group\AddForm',
        'group.getlist'=>'app\modules\v1\forms\group\GetListForm',
        'group.getall'=>'app\modules\v1\forms\group\GetAllForm',
        'group.update'=>'app\modules\v1\forms\group\UpdateForm',



    ];

    protected $run_map = [
        'group.delete'=>'app\modules\v1\forms\group\DeleteForm',
        'group.add'=>'app\modules\v1\forms\group\AddForm',
        'group.getlist'=>'app\modules\v1\forms\group\GetListForm',
        'group.getall'=>'app\modules\v1\forms\group\GetAllForm',

        'group.update'=>'app\modules\v1\forms\group\UpdateForm',

    ];
}