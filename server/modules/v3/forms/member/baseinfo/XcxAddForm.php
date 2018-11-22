<?php

namespace app\modules\v2\forms\member\baseinfo;



use app\componments\sql\SqlCreate;
use app\componments\utils\Ip;
use app\componments\utils\RandomUtils;
use app\models\api\member\group\MemberGroupApi;
use app\models\api\wx\xcx\WxXcxApi;
use app\modules\v2\forms\CommonForm;

class XcxAddForm extends CommonForm
{

    public $code;


    public function addRule(){
        return [
            [['code'],'required','message'=>'{attribute}不能为空'],
        ];
    }

    public function run($form){

        $code=$form->code;


        $obj=new WxXcxApi();
        $ret=$obj->getOpenIdAndSessionKey($code);

        return $ret;


        $cover=[
            'password'=>md5($form->password.\Yii::$app->params['salt']),
            'regdate'=>time(),
            'regip'=>Ip::get_real_ip(),
            'source'=>'api',
            'group_id'=>MemberGroupApi::getDefaultGroup()->group_id,
            'group_name'=>MemberGroupApi::getDefaultGroup()->name,
            'auth_key'=>RandomUtils::get_random_nummixenglish(32)
        ];

        $obj=new SqlCreate();
        $obj->setTableName('member_base');
        $obj->setData($form);
        $obj->setCoverData($cover);
        return $obj->run();

    }


}