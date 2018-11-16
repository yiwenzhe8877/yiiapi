<?php
/**
 * Created by PhpStorm.
 * User: idz025
 * Date: 2018/11/16
 * Time: 17:14
 */

namespace app\componments\sql;


use app\componments\utils\ApiException;
use app\componments\utils\Filter;

class SqlUpdate
{
    private $_tableName;
    private $_where;
    private $_fields;

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->_fields;
    }

    /**
     * @param mixed $fields
     */
    public function setFields($fields)
    {
        $this->_fields = $fields;
    }

    /**
     * @return mixed
     */
    public function getTableName()
    {
        return $this->_tableName;
    }

    /**
     * @param mixed $tableName
     */
    public function setTableName($tableName)
    {
        $this->_tableName = $tableName;
    }

    /**
     * @return mixed
     */
    public function getWhere()
    {
        return $this->_where;
    }

    /**
     * @param mixed $where
     */
    public function setWhere($where)
    {
        $this->_where = $where;
    }

    public  function run()
    {
        $sql="update ".$this->getTableName()." set ";


        if(count($this->getWhere())==0){
            ApiException::run("where参数为空",'900001');
        }
        if(count($this->getFields())==0){
            ApiException::run("fields参数为空",'900001');
        }

        foreach ($this->getFields() as $k=>$v){
            $sql.=Filter::sqlinject($k).'='.Filter::sqlinject($v).',';
        }
        $sql=substr($sql,0,strlen($sql)-1);
        

        foreach ($this->getWhere() as $k=>$v){
            $sql.=Filter::sqlinject($k).Filter::sqlinject($v);
        }

        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $result = $command->execute();

        return $result;
    }
}