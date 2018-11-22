<?php


namespace app\modules\v2\factory\member;



use app\modules\v2\factory\BaseFactory;

class MsgFactory extends BaseFactory
{
    public $form_map = [

        'membermsg.add'=>'app\modules\v2\forms\member\msg\AddForm',
        'membermsg.delete'=>'app\modules\v2\forms\member\msg\DeleteForm',
        'membermsg.update'=>'app\modules\v2\forms\member\msg\UpdateForm',
        'membermsg.getlist'=>'app\modules\v2\forms\member\msg\GetListForm',
        'membermsg.getall'=>'app\modules\v2\forms\member\msg\GetAllForm',
        'membermsg.changepassword'=>'app\modules\v2\forms\member\msg\ChangePasswordForm',
        'membermsg.changeriches'=>'app\modules\v2\forms\member\msg\ChangeRichesForm',
        'membermsg.setread'=>'app\modules\v2\forms\member\msg\SetReadForm',

    ];


}