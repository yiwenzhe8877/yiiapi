<?php

namespace app\modules\v1\forms\member\msg;


use app\componments\sql\SqlCreate;
use app\componments\utils\ApiException;
use app\componments\utils\Ip;
use app\componments\utils\RandomUtils;
use app\models\AdminGroup;
use app\models\user;
use app\models\api\admin\user\GetLoginedAdminUserApi;
use app\models\api\member\address\SetDefaultAddressApi;
use app\models\api\member\base\GetMemberInfoApi;
use app\models\api\member\group\MemberGroupApi;
use app\models\api\member\msg\ReadMsgApi;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\model\AddService;

class SetReadForm extends CommonForm
{


    public $msg_id;


    public function addRule(){
        return [
            [['msg_id'],'required','message'=>'{attribute}不能为空'],
            [['msg_id'], 'exist','targetClass' => 'app\models\MemberMsg', 'message' => '{attribute}不存在'],
        ];
    }

    public function run($form){

        return ReadMsgApi::setIsRead($form->msg_id);

    }


}