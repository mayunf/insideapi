<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2017/11/22
 * Time: 15:52
 */

namespace InsideAPI\Agent;


use InsideAPI\Core\AbstractAPI;

class Agent extends AbstractAPI
{

    const GET_INFO = 'insideagent/getinfo';

    const USER_ADD = 'insideagent/useradd';

    const USER_LIST = 'insideagent/userlist';

    const USER_EDIT = 'insideagent/useredit';

    const USER_DELETE = 'insideagent/userdelete';

    const USER_EDIT_PWD = 'insideagent/usereditpwd';

    const USER_EDIT_LOGON = 'insideagent/usereditlogon';
    /**
     * 获取代理商信息
     * @param array $params
     * @return \Mayunfeng\Supports\Collection
     */
    public function getInfo($params = [])
    {
        return $this->parseJSON(static::POST,[self::GET_INFO,$params]);
    }

    /**
     * 添加代理商下用户信息
     * @param array $params
     * @return \Mayunfeng\Supports\Collection
     */
    public function userAdd($params = [])
    {
        return $this->parseJSON(static::POST,[self::USER_ADD,$params]);
    }

    /**
     * 获取代理商下用户列表
     * @param array $params
     * @return \Mayunfeng\Supports\Collection
     */
    public function userEdit($params = [])
    {
        return $this->parseJSON(static::POST,[self::USER_EDIT,$params]);
    }

    /**
     * 获取代理商下用户列表
     * @param array $params
     * @return \Mayunfeng\Supports\Collection
     */
    public function userList($params = [])
    {
        return $this->parseJSON(static::POST,[self::USER_LIST,$params]);
    }

    /**
     * 获取用户权限
     * @param array $params
     * @return \Mayunfeng\Supports\Collection
     */
    public function userDelete($params = [])
    {
        return $this->parseJSON(static::POST,[self::USER_DELETE,$params]);
    }

    /**
     * 编辑用户密码
     * @param array $params
     * @return \Mayunfeng\Supports\Collection
     */
    public function userEditPwd($params = [])
    {
        return $this->parseJSON(static::POST,[self::USER_EDIT_PWD,$params]);
    }

    /**
     * 编辑用户登录名
     * @param array $params
     * @return \Mayunfeng\Supports\Collection
     */
    public function userEditLogon($params = [])
    {
        return $this->parseJSON(static::POST,[self::USER_EDIT_LOGON,$params]);
    }
}
