<?php

namespace app\modules\v1\forms\group;


use app\models\AdminGroup;
use app\models\AdminUser;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\model\UpdateService;
use app\modules\v1\utils\ApiException;

class UpdateForm extends CommonForm
{
    public $id;

    public $status;
    public $del;


    public function rules()
    {
        return [
            ['id','required','message'=>'id不能为空'],
            ['status','required','message'=>'状态标志不能为空'],
            ['del','required','message'=>'删除标志不能为空'],
        ];
    }


    public function run($form){
        $model=AdminGroup::findAll([$form->id]);

        if(!$model){
            ApiException::run("管理组id不存在",'900001',__CLASS__,__METHOD__,__LINE__);
        }




        UpdateService::run('group',$form->id,'id',$form);


        return "";
    }


}