<?php

namespace app\modules\v3\factory\member;

use app\modules\v3\factory\BaseFactory;

class CartFactory extends BaseFactory
{
    public $form_map = [
        'membercart.delete'=>'app\modules\v3\forms\member\cart\DeleteForm',
        'membercart.add'=>'app\modules\v3\forms\member\cart\AddForm',
        'membercart.getlist'=>'app\modules\v3\forms\member\cart\GetListForm',
        'membercart.update'=>'app\modules\v3\forms\member\cart\UpdateForm',
        'membercart.getall'=>'app\modules\v3\forms\member\cart\GetAllForm',
        'membercart.plus'=>'app\modules\v3\forms\member\cart\plusForm',
        'membercart.changecart'=>'app\modules\v3\forms\member\cart\ChangecartForm',
    ];

}