<?php

namespace app\modules\v2\forms\article\category;



use app\componments\sql\SqlUpdate;
use app\modules\v2\forms\CommonForm;


class UpdateForm extends CommonForm
{


   public $article_id;
	public $category_id;
	


    public function addRule(){
       return [
           [["article_id","category_id"],'required','message'=>'{attribute}不能为空'],
           [['article_id'], 'exist','targetClass' => 'app\models\article\category', 'message' => '{attribute}不存在'],

       ];
    }

    public function run($form){

        $obj=new SqlUpdate();
        $obj->setTableName('article_category');
        $obj->setData($form);
        $obj->setWhere(['article_id='=>$form->article_id]);
        return $obj->run();

    }
}