<?php

namespace app\modules\v1\forms\member\base;


use app\componments\sql\SqlCreate;
use app\componments\sql\SqlUpdate;
use app\componments\utils\ApiException;
use app\componments\utils\Ip;
use app\componments\utils\RandomUtils;
use app\models\AdminGroup;
use app\models\AdminUser;
use app\models\api\member\group\MemberGroupApi;
use app\models\MemberBase;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\model\AddService;

class ChangeRichesForm extends CommonForm
{


    public $type;
    public $value;
    public $member_id;


    public function addRule(){
        return [
            [['value','type','member_id'],'required','message'=>'{attribute}不能为空'],
            [['value'],'match','pattern'=>'/^[-]?[0-9][1-9]*$/','message'=>'{attribute}必须是整数'],
            ['type','in','range'=>['money','experience','point'],'message'=>'{attribute}非法'],
            [['member_id'], 'exist','targetClass' => 'app\models\MemberBase', 'message' => '用户不存在'],
        ];
    }

    public function run($form){
       $obj=new SqlUpdate();
       $obj->setWhere(['member_id='=>$form->member_id]);
       $obj->setTableName('member_base');
       $obj->setData([$form->type=>$form->value]);
       return  $obj->increase();

    }


}