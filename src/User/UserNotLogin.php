<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2017/11/24
 * Time: 9:34
 */

namespace InsideAPI\User;

use InsideAPI\Core\AbstractAPI;

/**
 * 用户登录前 API
 * Class BaseService
 * @package InsideAPI\user
 */
class UserNotLogin extends AbstractAPI
{
    const REGISTER = 'insideuser/register';

    const LOGON = 'insideuser/logon';

    const IS_MOBILE = 'insideuser/ismobile';

    const IS_EMAIL = 'insideuser/isemail';

    const EDIT_PWD_ME = 'insideuser/editpwdme';

    const ADD_USER_PER = 'insidemanage/adduserper2'; //不用登录

    const GET_PERS = 'insidemanage/getpers2'; //不用登录 获取系统权限列表

    const ADD_ACC_SETTING = 'insidemanage/addaccsetting2'; //不用登录 增加用户数量

    const GET_BIND_PZ_SM = 'insideCoupons/getbindingpzshenma'; //不用登录 领取优惠券

    const CHECK_BIND_WX = 'insideuser/checkbindweixin'; // 检测用户是否绑定微信

    const BIND_WX = 'insideuser/userbindweixin'; // 用户绑定微信

    const LOGON_WX = 'insideuser/logonwx'; // 微信登录

    const PAYMENT_STATE = 'InsideUser/paymentstate'; //支付成功通知


    /**
     * 判断手机是否注册
     * @param string $m
     * @return \Mayunfeng\Supports\Collection
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
     * @return \Mayunfeng\Supports\Collection
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
       $params = [
          'PT' => $userRegister->PT,
           'M' => (string)$userRegister->M,
          'IsM' => $userRegister->IsM,
          'Pwd' => (string)$userRegister->Pwd
     ];
     * @param $params = []
     * @return \Mayunfeng\Supports\Collection
     */
    public function register($params = [])
    {

        return $this->parseJSON(static::POST, [self::REGISTER, $params]);
    }

    /**
     * 用户登录API -- Done
     * @param $un
     * @param $pwd
     * @param $t
     * @param $pt
     * @return \Mayunfeng\Supports\Collection
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
     * @return \Mayunfeng\Supports\Collection
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
     * @return \Mayunfeng\Supports\Collection
     */
    public function editPwdMe($params = [])
    {
        return $this->parseJSON(static::POST, [self::EDIT_PWD_ME, $params]);
    }


    /**
     * 添加用户权限
     * @param $params = []
     * @return \Mayunfeng\Supports\Collection
     */
    public function addUserPer($params = [])
    {
        return $this->parseJSON(static::POST, [self::ADD_USER_PER, $params]);
    }


    /**
     * 获取系统权限
     * @param string $productType
     * @param string $perType
     * @return \Mayunfeng\Supports\Collection
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
     * @return \Mayunfeng\Supports\Collection
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
     * $params = [
           'CC' => $params['CC'],
            'PT' => $params['PT'],
            'R' => $params['R'],
            'M' => $params['M'],
        ];
     * @param $params
     * @return \Mayunfeng\Supports\Collection
     */
    public function getBindingPzSm($params)
    {

        return $this->parseJSON(static::POST, [self::GET_BIND_PZ_SM, $params]);
    }


    /**
     * 绑定微信
     * @param $unionId
     * @param $userId
     * @param string $mobile
     * @return \Mayunfeng\Supports\Collection
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
     * @return \Mayunfeng\Supports\Collection
     */
    public function checkBindWx($unionId = '', $userId = 0)
    {
        $params = [
            'UnionId' => $unionId,
            'Userid' => $userId
        ];
        return $this->parseJSON(static::POST, [self::CHECK_BIND_WX, $params]);
    }

    /**
     * 支付成功通知
     * @param array $params
     * @return \Mayunfeng\Supports\Collection
     */
    public function paymentState(array $params)
    {
        return $this->parseJSON(static::POST,[self::PAYMENT_STATE,$params]);
    }

}
