<?php

namespace app\modules\v1\forms\admin\group;



use app\modules\v1\forms\CommonForm;

class DeleteForm extends CommonForm
{
    public $id;


    public function rules()
    {
        return [
            [['id'],'required','message'=>'{attribute}不能为空'],
            ['id','match','pattern'=>'/^[1-9][0-9]*$/','message'=>'{attribute}必须是正整数'],
        ];
    }


    public function run($form){

        return 0;
    }

}