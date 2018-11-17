<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/17
 * Time: 11:51
 */
namespace app\models\api\member\base;

use app\componments\utils\ApiException;
use app\componments\utils\Assert;
use app\componments\utils\PwdEncryptUtils;
use app\models\MemberBase;

class ChangePasswordApi
{
    private $_password;
    private $_passwordagain;
    private $_member_id;

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->_password = $password;
    }

    /**
     * @return mixed
     */
    public function getPasswordagain()
    {
        return $this->_passwordagain;
    }

    /**
     * @param mixed $passwordagain
     */
    public function setPasswordagain($passwordagain)
    {
        $this->_passwordagain = $passwordagain;
    }

    /**
     * @return mixed
     */
    public function getMemberId()
    {
        return $this->_member_id;
    }

    /**
     * @param mixed $member_id
     */
    public function setMemberId($member_id)
    {
        $this->_member_id = $member_id;
    }

    public  function changePwd(){
        if($this->getPassword()!=$this->getPasswordagain()){
            ApiException::run("两次输入的密码不同",'900001',__CLASS__,__METHOD__,__LINE__);
        }

        Assert::PwdNotStrong($this->getPassword());

        MemberBase::updateAll([
            'password'=>PwdEncryptUtils::encryptLoginPwd($this->getPassword())
        ],['member_id'=>$this->getMemberId()]);

    }
}