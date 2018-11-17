<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/17
 * Time: 9:38
 */

namespace app\componments\utils;


use app\componments\sql\SqlGet;

class Assert
{
    public static function isEmpty($arr){
        foreach ($arr as $k=>$v){
            if(is_string($v)){
                if(empty($v) || $v=='' || $v==null){
                    ApiException::run($k."不存在或者为空",'900001',__CLASS__,__METHOD__,__LINE__);
                }
            }

            if(is_array($v)){

                if(count($v)==0)
                    ApiException::run($k."不能为空",'900001',__CLASS__,__METHOD__,__LINE__);
                }
            }
    }

    public static function isNotPageNum($v){
        if(!preg_match('/[1-9][0-9]*/',$v,$match))
            ApiException::run("页码错误",'900001',__CLASS__,__METHOD__,__LINE__);
    }


    public static function isNotEqual($a,$b){
    }
    //密码强度
    public static function PwdNotStrong($pwd){
        if(strlen($pwd)<6){
            ApiException::run("密码至少6位",'900001',__CLASS__,__METHOD__,__LINE__);
        }
        if(!preg_match("/[A-Za-z]/",$pwd) || !preg_match("/\d/",$pwd)){
            ApiException::run("密码必须同时包含字母和数字",'900001',__CLASS__,__METHOD__,__LINE__);
        }
    }

    public static function RecordNotExist($table,$where){
        $obj=new SqlGet();
        $obj->setTableName($table);
        $obj->setWhere($where);

        if( $obj->get_all()['total']==0){
            ApiException::run("查询".$table.'的记录不存在','900001',__CLASS__,__METHOD__,__LINE__);
        }
    }
}
