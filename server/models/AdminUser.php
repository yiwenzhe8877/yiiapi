<?php

namespace app\models;

use app\modules\v1\utils\CodeMsgMap;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "tk_user".
 *
 * @property int $user_id 管理员id
 * @property string $username 管理员账号名
 * @property string $password 管理员密码
 * @property string $nickname 昵称
 * @property string $phone 手机号
 * @property int $group_id 管理组id
 * @property string $auth_key 密钥
 *
 * @property AdminUserGroup[] $userGroups
 */
class AdminUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tk_admin_user';
    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        return static::findOne(['user_id'=>$id]);
    }
    public function loginByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key'=>$token]);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserGroups()
    {
        return $this->hasone(AdminUserGroup::className(), ['group_id' => 'group_id']);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
        return static::findOne(['auth_key'=>$token]);
    }
    //根据用户名查找用户
    public static function findByUsername($username)
    {
        return static::findOne(['username' => trim($username)]);
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->user_id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[AdminUser::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
        return $this->auth_key;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[AdminUser::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
        return $this->auth_key === $authKey;
    }

    //验证登陆密码
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    public static function get_list($pageNum,$username,$phone){

        $pagesize=\Yii::$app->params['page_size'];

        $model= AdminUser::find()
            ->select('*')
            ->orderBy('user_id desc')
            ->offset(($pageNum-1)*$pagesize)
            ->limit($pagesize);

        if(!empty($username)){
            $model=$model->andwhere(['like','username',$username]);
        }

        if(!empty($phone)){
            $model=$model->andwhere(['=','phone',$phone]);
        }


        $data=$model->asArray(true)->all();

        for ($i=0,$l=count($data);$i<$l;$i++){
            $item=$data[$i];

            $data[$i]['del_msg']=CodeMsgMap::Map('del',$item['del']);
            $data[$i]['status_msg']=CodeMsgMap::Map('status',$item['status']);
        }

        $count=$model->count();

        return [
            'pageNum'=>$pageNum,
            'pageSize'=>$pagesize,
            'total'=>(int)$count,
            'list'=>$data
        ];

    }


    public static function logout(){

        $uid=\Yii::$app->getUser()->getId();
        $model=AdminUser::findOne($uid);
        if(!$model){
            ApiException("token不存在或错误",'900001');
        }

        $model->auth_key=getRandom();
        $model->save();
        return "";
    }

}
