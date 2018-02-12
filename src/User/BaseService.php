<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2017/11/24
 * Time: 9:34
 */

namespace InsideAPI\User;

use InsideAPI\Core\BaseApi;

/**
 * 用户登录前 API
 * Class BaseService
 * @package InsideAPI\user
 */
class BaseService extends BaseApi
{
    const REGISTER = 'https://api.xiaolutuiguang.com/api/insideuser/register';

    const LOGON = 'https://api.xiaolutuiguang.com/api/insideuser/logon';

    const IS_MOBILE = 'https://api.xiaolutuiguang.com/api/insideuser/ismobile';

    const IS_EMAIL = 'https://api.xiaolutuiguang.com/api/insideuser/isemail';

    const EDIT_PWD_ME = 'https://api.xiaolutuiguang.com/api/insideuser/editpwdme';

    const ADD_USER_PER = 'https://api.xiaolutuiguang.com/api/insidemanage/adduserper2'; //不用登录

    const GET_PERS = 'https://api.xiaolutuiguang.com/api/insidemanage/getpers2'; //不用登录 获取系统权限列表

    const ADD_ACC_SETTING = 'https://api.xiaolutuiguang.com/api/insidemanage/addaccsetting2'; //不用登录 增加用户数量


    /**
     * 判断手机是否注册
     * @param string $m
     * @return string
     */
    public function isMobile($m)
    {
        $params = [
            'M' => $m
        ];
        return $this->parseJSON(static::POST,[self::IS_MOBILE,$params]);
    }

    /**
     * 判断邮箱是否注册
     * @param string $e
     * @return string
     */
    public function isEmail($e)
    {
        $params = [
            'E' => $e
        ];
        return $this->parseJSON(static::POST,[self::IS_EMAIL,$params]);
    }

    /**
     * 用户注册
     * @param $params = []
     * @return string
     */
    public function register($params = [])
    {
//        $params = [
//            'PT' => $userRegister->PT,
//            'M' => (string)$userRegister->M,
//            'IsM' => $userRegister->IsM,
//            'Pwd' => (string)$userRegister->Pwd
//        ];
        return $this->parseJSON(static::POST,[self::REGISTER,$params]);
    }

    /**
     * 用户登录API -- Done
     * @param $un
     * @param $pwd
     * @param $t
     * @param $pt
     * @return string
     */
    public function logon($un, $pwd,$t = 0,$pt = 200)
    {
        $params = [
            'PT' => $pt,
            'T' => $t,
            'UN' => $un,
            'Pwd' => $pwd
        ];
        return $this->parseJSON(static::POST,[self::LOGON,$params]);
    }

    /**
     * 修改密码
     * @param $params = []
     * @return string
     */
    public function editPwdMe($params = [])
    {
        return $this->parseJSON(static::POST,[self::EDIT_PWD_ME,$params]);
    }





    /**
     * 添加用户权限
     * @param $params = []
     * @return string
     */
    public function addUserPer($params = [])
    {
        return $this->parseJSON(static::POST,[self::ADD_USER_PER,$params]);
    }


    /**
     * 获取系统权限
     * @param string $productType
     * @param string $perType
     * @return string
     */
    public function getPers($productType = '', $perType = '')
    {
        $params = [
            'ProId' => $productType,
            'PerType' => $perType
        ];
        return $this->parseJSON(static::POST,[self::GET_PERS,$params]);
    }

    /**
     * 增加用户设置某个平台下的账户数量
     * @param $userId
     * @param $platformId
     * @param $num
     * @return string
     */
    public function addAccSetting($userId,$platformId,$num)
    {
        $params = [
            'Userid' => $userId,
            'Platform' =>$platformId,
            'Num' => $num
        ];
        return $this->parseJSON(static::POST,[self::ADD_ACC_SETTING,$params]);
    }
}