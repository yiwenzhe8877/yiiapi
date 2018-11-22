<?php


namespace app\modules\v2\factory\goods;


use app\modules\v2\factory\BaseFactory;

class ProductFactory extends BaseFactory
{
    public $form_map = [

        'goodsproduct.add'=>'app\modules\v2\forms\goods\product\AddForm',
        'goodsproduct.delete'=>'app\modules\v2\forms\goods\product\DeleteForm',
        'goodsproduct.update'=>'app\modules\v2\forms\goods\product\UpdateForm',
        'goodsproduct.getlist'=>'app\modules\v2\forms\goods\product\GetListForm',
        'goodsproduct.getall'=>'app\modules\v2\forms\goods\product\GetAllForm',

    ];


}