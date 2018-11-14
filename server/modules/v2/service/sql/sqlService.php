<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * Date: 2018/11/5
 * Time: 11:04
 */
namespace app\modules\v1\service\sql;

use app\modules\v1\utils\ApiException;
use app\modules\v1\utils\Filter;

class sqlService
{

    public static function get_list_by_page($field="*",$tableName="",$wheresql=[],$orderBy=""){
        $pagesize=\Yii::$app->params['page_size'];
        $post=\Yii::$app->getRequest()->post();

        if(!isset($post['pageNum']) || !is_numeric($post['pageNum'])){
            ApiException::run("pageNum参数错误","900001");
        }

        $pageNum=$post['pageNum'];

        $sql="select ".$field." from ".$tableName;

        if(count($wheresql)>0){

            $sql.=' where ';
            foreach ($wheresql as $k=>$v){
                if(!empty($k) && !empty($v)){
                    $sql.=Filter::sqlinject($k). Filter::sqlinject($v);
                }
            }
        }

        if($orderBy!=''){
            $sql.=' order By '.$orderBy;
        }
        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();
        $count=count($result);

        $sql.=' limit '.($pageNum-1)*($pagesize).','.($pagesize*$pageNum);

        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();

        return [
            'pageNum'=>$pageNum,
            'pageSize'=>$pagesize,
            'total'=>(int)$count,
            'list'=>$result
        ];


    }

    public static function get_all($field="*",$tableName="",$wheresql=[],$orderBy=""){


        $sql="select ".$field." from ".$tableName;

        if(count($wheresql)>0){
            $sql.=' where ';
            foreach ($wheresql as $k=>$v){
                $sql.=Filter::sqlinject($k). Filter::sqlinject($v);
            }
        }

        if($orderBy!=''){
            $sql.=' order By '.$orderBy;
        }
        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();
        $count=count($result);


        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();

        return [
            'total'=>(int)$count,
            'list'=>$result
        ];
    }


}