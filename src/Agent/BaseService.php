<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2017/12/16
 * Time: 14:17
 */

namespace InsideAPI\Agent;


use InsideAPI\Core\BaseApi;

class BaseService extends BaseApi
{

    const IS_MOBILE = 'https://api.xiaolutuiguang.com/api/insideagent/ismobile';

    const IS_EMAIL = 'https://api.xiaolutuiguang.com/api/insideagent/isemail';

    const REGISTER = 'https://api.xiaolutuiguang.com/api/insideagent/register';

    const LOGON = 'https://api.xiaolutuiguang.com/api/insideagent/logon';



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
     * 代理商注册
     * @param  array $params
     * @return string
     */
    public function register($params)
    {
        return $this->parseJSON(static::POST,[self::REGISTER,$params]);
    }

    /**
     * 代理商登录
     * @param  string $un
     * @param  string $pwd
     * @return string
     */
    public function logon($un,$pwd)
    {
        $params = [
            'UN' => $un,
            'PWD' =>$pwd
        ];
        return $this->parseJSON(static::POST,[self::LOGON,$params]);
    }

}