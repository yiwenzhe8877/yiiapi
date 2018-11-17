<?php

namespace app\models;

use Yii;

/**
 * This is the model classes for table "tk_group_auth".
 *
 * @property int $group_id 管理组id
 * @property string $auth_id 权限id
 *
 * @property AdminAuth $auth
 * @property AdminGroup $group
 */
class AdminGroupAuth extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tk_admin_group_auth';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'auth_id'], 'required'],
            [['group_id', 'auth_id'], 'integer'],
            [['auth_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdminAuth::className(), 'targetAttribute' => ['auth_id' => 'auth_id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdminGroup::className(), 'targetAttribute' => ['group_id' => 'group_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'AdminGroup ID',
            'auth_id' => 'AdminAuth ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuth()
    {
        return $this->hasOne(AdminAuth::className(), ['auth_id' => 'auth_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(AdminGroup::className(), ['group_id' => 'group_id']);
    }


    public static function get_list($pageNum,$group_id){

        $pagesize=\Yii::$app->params['page_size'];


        $model= AdminAuth::find()
            ->select(
                "tk_group_auth.auth_id,
                tk_group_auth.group_id,
                tk_group_auth.status,
                tk_auth.name,
                tk_auth.module,
                tk_auth.controller,
                tk_auth.action,
                ")
            ->leftJoin('tk_group_auth','tk_auth.auth_id=tk_group_auth.auth_id')
            ->andWhere(['=','tk_group_auth.group_id',$group_id])
            ->offset(($pageNum-1)*$pagesize)
            ->limit($pagesize);


        $data=$model->asArray(true)->all();
        $count=$model->count();


        return [
            'pageNum'=>$pageNum,
            'pageSize'=>$pagesize,
            'total'=>(int)$count,
            'list'=>$data
        ];

    }

    public static function get_list_all(){

        $pagesize=\Yii::$app->params['page_size'];


        $data= AdminAuth::find()
            ->select(
                "tk_group_auth.auth_id,
                tk_group_auth.group_id,
                tk_group_auth.status,
                tk_auth.name,
                tk_auth.module,
                tk_auth.controller,
                tk_auth.action,
                ")
            ->leftJoin('tk_group_auth','tk_auth.auth_id=tk_group_auth.auth_id')
            ->andWhere(['=','tk_auth.del',0])
            ->asArray()
            ->all();
        var_dump($data);



    }
}
