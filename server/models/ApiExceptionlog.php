<?php
/**
 * Created by PhpStorm.
 * AdminUser: idz025
 * Date: 2018/10/26
 * Time: 9:13
 */

namespace app\models;


class ApiExceptionlog extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'tk_api_exceptionlog';
    }

}