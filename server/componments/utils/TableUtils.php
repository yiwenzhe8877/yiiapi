<?php
/**
 * Created by PhpStorm.
 * User: idz025
 * Date: 2018/11/28
 * Time: 16:55
 */

namespace app\componments\utils;


class TableUtils
{
    public static function getTableFields($table){

        $tableSchema = \Yii::$app->db->schema->getTableSchema($table);
        $fields = \yii\helpers\ArrayHelper::getColumn($tableSchema->columns, 'name', false);
        return $fields;
    }


}