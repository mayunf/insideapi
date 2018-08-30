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
class UserNotLogin extends BaseApi
{
    const REGISTER = 'https://api.xiaolutuiguang.com/api/insideuser/register';

    const LOGON = 'https://api.xiaolutuiguang.com/api/insideuser/logon';

    const IS_MOBILE = 'https://api.xiaolutuiguang.com/api/insideuser/ismobile';

    const IS_EMAIL = 'https://api.xiaolutuiguang.com/api/insideuser/isemail';

    const EDIT_PWD_ME = 'https://api.xiaolutuiguang.com/api/insideuser/editpwdme';

    const ADD_USER_PER = 'https://api.xiaolutuiguang.com/api/insidemanage/adduserper2'; //不用登录

    const GET_PERS = 'https://api.xiaolutuiguang.com/api/insidemanage/getpers2'; //不用登录 获取系统权限列表

    const ADD_ACC_SETTING = 'https://api.xiaolutuiguang.com/api/insidemanage/addaccsetting2'; //不用登录 增加用户数量

    const GET_BIND_PZ_SM = 'https://api.xiaolutuiguang.com/api/insideCoupons/getbindingpzshenma'; //不用登录 领取优惠券

    const CHECK_BIND_WX = 'https://api.xiaolutuiguang.com/api/insideuser/checkbindweixin'; // 检测用户是否绑定微信

    const BIND_WX = 'https://api.xiaolutuiguang.com/api/insideuser/userbindweixin'; // 用户绑定微信

    const LOGON_WX = 'https://api.xiaolutuiguang.com/api/insideuser/logonwx'; // 微信登录


    /**
     * 判断手机是否注册
     * @param string $m
     * @return \InsideAPI\Support\Collection
     */
    public function isMobile($m)
    {
        $params = [
            'M' => $m
        ];
        return $this->parseJSON(static::POST, [self::IS_MOBILE, $params]);
    }

    /**
     * 判断邮箱是否注册
     * @param string $e
     * @return \InsideAPI\Support\Collection
     */
    public function isEmail($e)
    {
        $params = [
            'E' => $e
        ];
        return $this->parseJSON(static::POST, [self::IS_EMAIL, $params]);
    }

    /**
     * 用户注册
     * @param $params = []
     * @return \InsideAPI\Support\Collection
     */
    public function register($params = [])
    {
//        $params = [
//            'PT' => $userRegister->PT,
//            'M' => (string)$userRegister->M,
//            'IsM' => $userRegister->IsM,
//            'Pwd' => (string)$userRegister->Pwd
//        ];
        return $this->parseJSON(static::POST, [self::REGISTER, $params]);
    }

    /**
     * 用户登录API -- Done
     * @param $un
     * @param $pwd
     * @param $t
     * @param $pt
     * @return \InsideAPI\Support\Collection
     */
    public function logon($un, $pwd, $t = 0, $pt = 200)
    {
        $params = [
            'PT' => $pt,
            'T' => $t,
            'UN' => $un,
            'Pwd' => $pwd
        ];
        return $this->parseJSON(static::POST, [self::LOGON, $params]);
    }


    /**
     * 用户登录 （微信UnionId）
     * @param $unionId
     * @param int $t
     * @param int $pt
     * @return \InsideAPI\Support\Collection
     */
    public function logonWx($unionId, $t = 0, $pt = 200)
    {
        $params = [
            'PT' => $pt,
            'T' => $t,
            'UnionId' => $unionId
        ];

        return $this->parseJSON(static::POST, [self::LOGON_WX, $params]);
    }

    /**
     * 修改密码
     * @param $params = []
     * @return \InsideAPI\Support\Collection
     */
    public function editPwdMe($params = [])
    {
        return $this->parseJSON(static::POST, [self::EDIT_PWD_ME, $params]);
    }


    /**
     * 添加用户权限
     * @param $params = []
     * @return \InsideAPI\Support\Collection
     */
    public function addUserPer($params = [])
    {
        return $this->parseJSON(static::POST, [self::ADD_USER_PER, $params]);
    }


    /**
     * 获取系统权限
     * @param string $productType
     * @param string $perType
     * @return \InsideAPI\Support\Collection
     */
    public function getPers($productType = '', $perType = '')
    {
        $params = [
            'ProId' => $productType,
            'PerType' => $perType
        ];
        return $this->parseJSON(static::POST, [self::GET_PERS, $params]);
    }

    /**
     * 增加用户设置某个平台下的账户数量
     * @param $userId
     * @param $platformId
     * @param $num
     * @return \InsideAPI\Support\Collection
     */
    public function addAccSetting($userId, $platformId, $num)
    {
        $params = [
            'Userid' => $userId,
            'Platform' => $platformId,
            'Num' => $num
        ];
        return $this->parseJSON(static::POST, [self::ADD_ACC_SETTING, $params]);
    }

    /**
     * 领取优惠券
     * @param $params
     * @return \InsideAPI\Support\Collection
     */
    public function getBindingPzSm($params)
    {
//        $params = [
//            'CC' => $params['CC'],
//            'PT' => $params['PT'],
//            'R' => $params['R'],
//            'M' => $params['M'],
//        ];
        return $this->parseJSON(static::POST, [self::GET_BIND_PZ_SM, $params]);
    }


    /**
     * 绑定微信
     * @param $unionId
     * @param $userId
     * @param string $mobile
     * @return \InsideAPI\Support\Collection
     */
    public function bindWx($unionId, $userId = 0, $mobile = '')
    {
        $params = [
            'UnionId' => $unionId,
            'Userid' => $userId,
            'Mobile' => $mobile
        ];
        return $this->parseJSON(static::POST, [self::BIND_WX, $params]);
    }


    /**
     * 检测是否绑定微信
     * @param string $unionId
     * @param int $userId
     * @return \InsideAPI\Support\Collection
     */
    public function checkBindWx($unionId = '', $userId = 0)
    {
        $params = [
            'UnionId' => $unionId,
            'Userid' => $userId
        ];
        return $this->parseJSON(static::POST, [self::CHECK_BIND_WX, $params]);
    }

}
