<?php
/**
 * Created by PhpStorm.
 * AdminUser: admin
 * DateUtils: 2018/7/23
 * Time: 17:20
 */

namespace app\modules\v1\forms;


use yii\base\Model;

class CommonForm extends Model
{

    public function addRule(){
        return [
        ];
    }

    public function rules()
    {

        $temp=$this->getRules(FORM_CLASS);
        foreach ($this->addRule() as $k=>$v){
            array_push($temp,$v);
        }
        return $temp;
    }

    public function getRules($class){
        $rules=$this->baseRule();
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


    private function baseRule()
    {
        return [
            ['pageNum','match','pattern'=>'/^[1-9][0-9]*$/','message'=>'pageNum必须是正整数'],
            ['id','match','pattern'=>'/^[1-9][0-9]*$/','message'=>'id必须是正整数'],
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