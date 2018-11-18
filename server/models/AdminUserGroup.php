<?php

namespace app\models;

use Yii;

/**
 * This is the model classes for table "tk_user_group".
 *
 * @property int $user_id
 * @property int $group_id
 *
 * @property AdminGroup $group
 * @property adminUser $adminUser
 */
class AdminUserGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tk_user_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'group_id'], 'integer'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdminGroup::className(), 'targetAttribute' => ['group_id' => 'group_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => user::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'adminUser ID',
            'group_id' => 'AdminGroup ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(AdminGroup::className(), ['group_id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(user::className(), ['user_id' => 'user_id']);
    }
}
