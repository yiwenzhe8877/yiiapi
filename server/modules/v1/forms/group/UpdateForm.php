<?php

namespace app\modules\v1\forms\group;


use app\componments\utils\ApiException;
use app\models\AdminGroup;
use app\modules\v1\forms\CommonForm;
use app\modules\v1\service\model\UpdateService;

class UpdateForm extends CommonForm
{
    public $id;

    public $status;
    public $del;





    public function run($form){
        $model=AdminGroup::find()->andWhere(['=','group_id',(int)$form->id]);


        if(!$model){
            ApiException::run("管理组id不存在",'900001',__CLASS__,__METHOD__,__LINE__);
        }




        UpdateService::run('group',$form->id,'id',$form);


        return "";
    }


}