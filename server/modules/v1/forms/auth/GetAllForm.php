<?php

namespace app\modules\v1\forms\group;


use app\models\AdminUser;
use app\modules\v1\service\sql\sqlService;
use app\modules\v1\utils\CodeMsgMap;

use app\modules\v1\utils\Filter;
use yii\base\Model;
use app\modules\v1\forms\CommonForm;

class GetAllForm extends CommonForm
{



    public function rules()
    {
        $result=parent::getRules(FORM_CLASS);


        return array_merge($result,$this->addRule());
    }

    public function addRule(){
        return [

        ];
    }


    public function run(){

        $wheresql=[];

        $data=sqlService::get_all('*','tk_admin_auth',$wheresql,'group_id desc');

        return $data;
    }

}