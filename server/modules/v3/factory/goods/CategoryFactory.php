<?php

namespace app\modules\v2\factory\goods;

use app\modules\v2\factory\BaseFactory;

class CategoryFactory extends BaseFactory
{
    public $form_map = [
        'goodscategory.delete'=>'app\modules\v1\forms\goods\category\DeleteForm',
        'goodscategory.add'=>'app\modules\v1\forms\goods\category\AddForm',
        'goodscategory.getlist'=>'app\modules\v1\forms\goods\category\GetListForm',
        'goodscategory.update'=>'app\modules\v1\forms\goods\category\UpdateForm',
        'goodscategory.getall'=>'app\modules\v1\forms\goods\category\GetAllForm',
    ];

}