<?php

namespace app\modules\v2\factory\goods;

use app\modules\v2\factory\BaseFactory;

class ProductFactory extends BaseFactory
{
    public $form_map = [
        'goodsproduct.delete'=>'app\modules\v1\forms\goods\product\DeleteForm',
        'goodsproduct.add'=>'app\modules\v1\forms\goods\product\AddForm',
        'goodsproduct.getlist'=>'app\modules\v1\forms\goods\product\GetListForm',
        'goodsproduct.update'=>'app\modules\v1\forms\goods\product\UpdateForm',
        'goodsproduct.getall'=>'app\modules\v1\forms\goods\product\GetAllForm',
    ];

}