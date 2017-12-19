<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2017/11/24
 * Time: 9:34
 */

namespace InsideApi\User;

use InsideApi\Core\BaseApi;
/**
 * 用户登录前 API
 * Class BaseService
 */
class UserWithoutLoginAPI extends BaseApi
{
    const REGISTER = 'https://api.xiaolutuiguang.com/api/insideuser/register';

    const LOGON = 'https://api.xiaolutuiguang.com/api/insideuser/logon';

    const IS_MOBILE = 'https://api.xiaolutuiguang.com/api/insideuser/ismobile';

    /**
     * 获取用户信息 -- Done
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
     * 用户注册
     * @param UserRegister $userRegister
     * @return string
     */
    public function register($params = [])
    {
        return $this->parseJSON(static::POST,[self::REGISTER,$]);
    }

    /**
     * 用户登录API -- Done
     * @param $un
     * @param $pwd
     * @return string
     */
    public function logon($un, $pwd)
    {
        $params = [
            'PT' => EProductType::XL_Platform,
            'T' => ELogonType::User,
            'UN' => $un,
            'Pwd' => $pwd
        ];
        return $this->parseJSON(static::POST,[self::LOGON,$params]);
    }
}