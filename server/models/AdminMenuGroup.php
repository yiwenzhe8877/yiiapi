<?php

namespace app\models;

use Yii;

/**
 * This is the model classes for table "tk_menu_group".
 *
 * @property int $menu_id 菜单id
 * @property int $group_id 用户组id
 *
 * @property AdminMenu $menu
 * @property AdminGroup $group
 */
class AdminMenuGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tk_admin_menu_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_id', 'group_id'], 'required'],
            [['menu_id', 'group_id'], 'integer'],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdminMenu::className(), 'targetAttribute' => ['menu_id' => 'menu_id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdminGroup::className(), 'targetAttribute' => ['group_id' => 'group_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => 'AdminMenu ID',
            'group_id' => 'AdminGroup ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(AdminMenu::className(), ['menu_id' => 'menu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(AdminGroup::className(), ['group_id' => 'group_id']);
    }
}
