<?php

namespace app\modules\v2\factory\goods;

use app\modules\v2\factory\BaseFactory;

class LogsFactory extends BaseFactory
{
    public $form_map = [
        'goodslogs.delete'=>'app\modules\v1\forms\goods\logs\DeleteForm',
        'goodslogs.add'=>'app\modules\v1\forms\goods\logs\AddForm',
        'goodslogs.getlist'=>'app\modules\v1\forms\goods\logs\GetListForm',
        'goodslogs.update'=>'app\modules\v1\forms\goods\logs\UpdateForm',
        'goodslogs.getall'=>'app\modules\v1\forms\goods\logs\GetAllForm',
    ];

}