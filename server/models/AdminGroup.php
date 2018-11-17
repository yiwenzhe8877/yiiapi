<?php

namespace app\models;

use app\modules\v1\utils\CodeMsgMap;
use Yii;

/**
 * This is the model classes for table "tk_group".
 *
 * @property int $group_id 管理组id
 * @property string $name 组名称
 * @property int $status 1表示启用,0表示关闭的
 *
 * @property AdminGroupAuth[] $groupAuths
 * @property AdminUserGroup[] $userGroups
 */
class AdminGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tk_admin_group';
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupAuths()
    {
        return $this->hasMany(AdminGroupAuth::className(), ['group_id' => 'group_id']);
    }

    public function getAuths()
    {

        return $this->hasMany(AdminAuth::className(), ['auth_id' => 'auth_id'])
           ->viaTable(AdminGroupAuth::tableName(),['group_id'=>'group_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserGroups()
    {
        return $this->hasMany(AdminUserGroup::className(), ['group_id' => 'group_id']);
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupMenus()
    {
        return $this->hasMany(AdminMenuGroup::className(), ['group_id' => 'group_id']);
    }

    public static function getGroupIdByUid($id){
        $user=AdminUser::findOne($id);
        $group_id=$user->userGroups->group_id;
        return $group_id;
    }

    public static function getGroupId(){
        $id=\Yii::$app->getUser()->getId();
        return self::getGroupIdByUid($id);
    }



    public static function get_all(){
        $data= AdminGroup::find()
            ->orderBy('group_id desc')

            ->all();

        return ['list'=>$data];
    }

    public static function get_list($pageNum,$group_name){
        $pagesize=\Yii::$app->params['page_size'];

        $model= AdminGroup::find()
            ->orderBy('group_id desc')
            ->offset(($pageNum-1)*$pagesize)
            ->limit($pagesize);

        if(!empty($group_name)){
            $model=$model->andWhere(['like','group_name',$group_name]);
        }

        $data=$model->asArray()->all();


        for ($i=0,$l=count($data);$i<$l;$i++){
            $item=$data[$i];

            $data[$i]['del_msg']=CodeMsgMap::Map('del',$item['del']);
            $data[$i]['status_msg']=CodeMsgMap::Map('status',$item['status']);
        }


        $count=$model->count();
        return [
            'pageNum'=>$pageNum,
            'pageSize'=>$pagesize,
            'total'=>$count,
            'list'=>$data
        ];

    }



}
