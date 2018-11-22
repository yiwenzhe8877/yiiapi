<?php


namespace app\modules\v2\factory\member;


use app\modules\v2\factory\BaseFactory;

class AddressFactory extends BaseFactory
{
    public $form_map = [

        'memberaddress.add'=>'app\modules\v2\forms\member\address\AddForm',
        'memberaddress.delete'=>'app\modules\v2\forms\member\address\DeleteForm',
        'memberaddress.update'=>'app\modules\v2\forms\member\address\UpdateForm',
        'memberaddress.getlist'=>'app\modules\v2\forms\member\address\GetListForm',
        'memberaddress.getall'=>'app\modules\v2\forms\member\address\GetAllForm',

    ];


}