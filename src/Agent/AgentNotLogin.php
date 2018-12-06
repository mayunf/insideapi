<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2017/12/16
 * Time: 14:17
 */

namespace InsideAPI\Agent;


use InsideAPI\Core\AbstractAPI;

class AgentNotLogin extends AbstractAPI
{

    const IS_MOBILE = 'insideagent/ismobile';

    const IS_EMAIL = 'insideagent/isemail';

    const REGISTER = 'insideagent/register';

    const LOGON = 'insideagent/logon';


    /**
     * 判断手机是否注册
     * @param $m
     * @return \Mayunfeng\Supports\Collection
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
     * @return \Mayunfeng\Supports\Collection
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
     * @return \Mayunfeng\Supports\Collection
     */
    public function register($params)
    {
        return $this->parseJSON(static::POST,[self::REGISTER,$params]);
    }

    /**
     * 代理商登录
     * @param  string $un
     * @param  string $pwd
     * @return \Mayunfeng\Supports\Collection
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
