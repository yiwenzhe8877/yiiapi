<?php

namespace app\modules\v2\factory\freight;

use app\modules\v2\factory\BaseFactory;

class TemplateFactory extends BaseFactory
{
    public $form_map = [
        'freighttemplate.delete'=>'app\modules\v2\forms\freight\template\DeleteForm',
        'freighttemplate.add'=>'app\modules\v2\forms\freight\template\AddForm',
        'freighttemplate.getlist'=>'app\modules\v2\forms\freight\template\GetListForm',
        'freighttemplate.update'=>'app\modules\v2\forms\freight\template\UpdateForm',
        'freighttemplate.getall'=>'app\modules\v2\forms\freight\template\GetAllForm',
    ];

}