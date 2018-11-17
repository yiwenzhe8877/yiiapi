<?php


namespace app\modules\v1\factory;


class GoodsClassFactory extends BaseFactory
{
    public $form_map = [

        'goodscategory.add'=>'app\modules\v1\forms\goods\category\AddForm',
        'goodscategory.delete'=>'app\modules\v1\forms\goods\category\DeleteForm',
        'goodscategory.update'=>'app\modules\v1\forms\goods\category\UpdateForm',
        'goodscategory.getlist'=>'app\modules\v1\forms\goods\category\GetListForm',
        'goodscategory.getall'=>'app\modules\v1\forms\goods\category\GetAllForm',

    ];


}