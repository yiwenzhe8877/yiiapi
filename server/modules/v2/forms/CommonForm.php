<?php
/**
 * Created by PhpStorm.
 * AdminUser: admin
 * Date: 2018/7/23
 * Time: 17:20
 */

namespace app\modules\v1\forms;


use yii\base\Model;

class CommonForm extends Model
{
    public function rules()
    {
        return array_merge($this->getRules(FORM_CLASS),$this->addRule());
    }


    public function addRule(){
        return [];
    }

    public function getRules($class){
        $rules=$this->myrules();
        $arr= get_class_vars($class);

        $result=[];
        foreach ($arr as $k=>$v){
            foreach ($rules as $n){
                if($n[0]==$k){
                    array_push($result,$n);
                }
            }
        }
        return $result;

    }


    public function myrules()
    {
        return [
            ['id','required','message'=>'id不能为空'],
            ['id','match','pattern'=>'/^[1-9]\d*$/','message'=>'id必须是正整数'],
            ['group_id','match','pattern'=>'/^[1-9]\d*$/','message'=>'group_id必须是正整数'],
            ['status','required','message'=>'状态标志不能为空'],
            ['del','required','message'=>'删除标志不能为空'],
            [['pageNum'],'match','pattern'=>'/^[1-9]\d*$/','message'=>'pageNum必须是正整数'],

        ];
    }

    //返回第一个错误信息
    public function getError()
    {
        if(empty($this->errors))
        {
            return "";
        }
        $errors = $this->errors;
        $error = array_shift($errors);
        return $error[0];
    }
}