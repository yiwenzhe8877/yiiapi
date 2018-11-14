<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tk_user_group".
 *
 * @property int $user_id
 * @property int $group_id
 *
 * @property AdminGroup $group
 * @property AdminUser $user
 */
class UserGroup extends \yii\db\ActiveRecord
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
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdminUser::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'AdminUser ID',
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
        return $this->hasOne(AdminUser::className(), ['user_id' => 'user_id']);
    }
}
