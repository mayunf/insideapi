<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2017/12/5
 * Time: 20:51
 */

namespace InsideAPI\User;


use InsideAPI\Core\AbstractAPI;

class ManageService extends AbstractAPI
{

    const GET_PERMISSIONS = 'https://api.xiaolutuiguang.com/api/insidemanage/getper'; // 通过权限ID获取权限

    const ADD_PER = 'https://api.xiaolutuiguang.com/api/insidemanage/addper'; // 通过权限ID获取权限

    const EDIT_PER = 'https://api.xiaolutuiguang.com/api/insidemanage/editper'; // 修改权限

    const GET_PERMISSIONS_LIST = 'https://api.xiaolutuiguang.com/api/insidemanage/getpers'; // 获取系统权限列表

    const ADD_ACC_SETTING = 'https://api.xiaolutuiguang.com/api/insidemanage/addaccsetting'; //增加用户数量

    const GET_USER = 'https://api.xiaolutuiguang.com/api/insidemanage/getuser'; //获取用户信息

    const ADD_USER_PER = 'https://api.xiaolutuiguang.com/api/insidemanage/adduserper'; //添加用户权限

    const GET_USERS = 'https://api.xiaolutuiguang.com/api/insidemanage/getusers'; //获取用户列表

    const GET_USER_PER = 'https://api.xiaolutuiguang.com/api/insidemanage/getuserper'; //获取用户权限

    const EDIT_USER_PER = 'https://api.xiaolutuiguang.com/api/insidemanage/edituserper'; //编辑用户权限

    const GET_USER_PER_MORE = 'https://api.xiaolutuiguang.com/api/insidemanage/getuserpers'; //获取用户权限余额

    const DEL_USER_PER = 'https://api.xiaolutuiguang.com/api/insidemanage/deluserper'; //删除用户权限余额


    const GET_ACC_SETTING = 'https://api.xiaolutuiguang.com/api/insidemanage/getaccsetting'; //获取用户账户设置

    const EDIT_ACC_SETTING = 'https://api.xiaolutuiguang.com/api/insidemanage/editaccsetting'; //编辑用户账户设置

    const GET_ACCOUNTS = 'https://api.xiaolutuiguang.com/api/insidemanage/getaccounts'; // 获取账户列表

    const DEL_ACCOUNT = 'https://api.xiaolutuiguang.com/api/insidemanage/delaccount'; // 删除账户


    const GET_AGENTS = 'https://api.xiaolutuiguang.com/api/insidemanage/getagents'; //获取代理商列表

    const GET_AGENT_PER = 'https://api.xiaolutuiguang.com/api/insidemanage/getagentper'; //获取代理商列表

    const GET_AGENT_ACC_SET = 'https://api.xiaolutuiguang.com/api/insidemanage/getagentaccset'; //获取代理商账户设置

    const EDIT_AGENT_ACC_SET = 'https://api.xiaolutuiguang.com/api/insidemanage/editagentaccset'; //编辑代理商账户设置

    const EDIT_AGENT_PER = 'https://api.xiaolutuiguang.com/api/insidemanage/editagentper'; //编辑代理商权限

    const ADD_AGENT_PER = 'https://api.xiaolutuiguang.com/api/insidemanage/addagentper'; //添加代理商权限


    /**
     * 获取用户信息
     * @param $userId
     * @return string
     */
    public function getUser($userId)
    {
        $params = [
            'UserId' => (int)$userId
        ];
        return $this->parseJSON(static::POST,[self::GET_USER,$params]);
    }

    /**
     * 获取用户列表
     * @param array $params
     * @return string
     */
    public function getUsers($params = [])
    {
        return $this->parseJSON(static::POST,[self::GET_USERS,$params]);
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
     * 添加权限
     * @param array $params
     * @return string
     */
    public function addPer($params = [])
    {
        return $this->parseJSON(static::POST,[self::ADD_PER,$params]);
    }

    /**
     * 修改权限
     * @param $Id
     * @param $PerType
     * @return string
     */
    public function editPer($Id,$PerType)
    {
        $params = [
            'Id'=> (int)$Id,
            'PerType'=>(int)$PerType
        ];
        return $this->parseJSON(static::POST,[self::EDIT_PER,$params]);
    }

    
    /**
     * 根据权限ID获取权限
     * @param $perId
     * @return string
     */
    public function getPermissions($perId)
    {
        $params = [
            'PerId' => (int)$perId
        ];
        return $this->parseJSON(static::POST,[self::GET_PERMISSIONS,$params]);
    }

    /**
     * 获取系统权限列表
     * @param $ProId
     * @param $PerType
     * @return string
     */
    public function getPermissionsList($ProId,$PerType)
    {
        $params = [
            'ProId'=>(int)$ProId,
            'PerType'=>(int)$PerType
        ];
        return $this->parseJSON(static::POST,[self::GET_PERMISSIONS_LIST,$params]);
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
            'Userid' => (int)$userId,
            'Platform' =>(int)$platformId,
            'Num' => (int)$num
        ];
        return $this->parseJSON(static::POST,[self::ADD_ACC_SETTING,$params]);
    }

    /**
     * 获取用户权限
     * @param $userId
     * @return string
     */
    public function getUserPer($userId)
    {
        $params = [
            'UserId'=>(int)$userId
        ];
        return $this->parseJSON(static::POST,[self::GET_USER_PER,$params]);
    }

    /**
     * 编辑用户权限
     * @param $params
     * @return string
     */
    public function editUserPer($params)
    {
        return $this->parseJSON(static::POST,[self::EDIT_USER_PER,$params]);
    }

    /**
     * 获取用户余额权限
     * @param $userId
     * @return string
     */
    public function getUserPerMores($userId)
    {
        $params = [
            'UserId'=>(int)$userId
        ];
        return $this->parseJSON(static::POST,[self::GET_USER_PER_MORE,$params]);
    }

    /**
     * 删除用户权限余额
     * @param $id
     * @return string
     */
    public function delUserPer($id)
    {
        $params = [
            'Id'=>(int)$id
        ];
        return $this->parseJSON(static::POST,[self::DEL_USER_PER,$params]);
    }



    /**
     * 获取用户账户设置
     * @param $userId
     * @return string
     */
    public function getAccSetting($userId)
    {
        $params = [
            'UserId'=>(int)$userId
        ];
        return $this->parseJSON(static::POST,[self::GET_ACC_SETTING,$params]);
    }

    /**
     * 编辑用户账户设置
     * @param array $params
     * @return string
     */
    public function editAccSetting($params = [])
    {
        return $this->parseJSON(static::POST,[self::EDIT_ACC_SETTING,$params]);
    }

    /**
     * 获取用户账户列表
     * @param $userId
     * @return string
     */
    public function getAccounts($userId)
    {
        $params = [
            'UserId'=>(int)$userId
        ];
        return $this->parseJSON(static::POST,[self::GET_ACCOUNTS,$params]);
    }

    /**
     * 删除账户
     * @param $userId
     * @param $accId
     * @param $platform
     * @return string
     */
    public function delAccount($userId,$accId,$platform)
    {
        $params = [
            'UserId'=>(int)$userId,
            'AccId'=>(int)$accId,
            'Platform'=>(int)$platform
        ];
        return $this->parseJSON(static::POST,[self::DEL_ACCOUNT,$params]);
    }

    /**
     * 获取代理商列表
     * @return string
     */
    public function getAgents()
    {
        $params = [];
        return $this->parseJSON(static::POST,[self::GET_AGENTS,$params]);
    }

    /**
     * 获取代理商权限
     * @param $AgentId
     * @return string
     */
    public function getAgentPer($AgentId)
    {
        $params = [
            'AgentId'=>(int)$AgentId
        ];
        return $this->parseJSON(static::POST,[self::GET_AGENT_PER,$params]);
    }

    /**
     * 获取代理商账户设置
     * @param $Aid
     * @return string
     */
    public function getAgentAccSet($Aid)
    {
        $params = [
            'Aid'=>(int)$Aid
        ];
        return $this->parseJSON(static::POST,[self::GET_AGENT_ACC_SET,$params]);
    }

    /**
     * 编辑代理商账户设置
     * @param array $params
     * @return string
     */
    public function editAgentAccSetting($params = [])
    {
        return $this->parseJSON(static::POST,[self::EDIT_AGENT_ACC_SET,$params]);
    }

    /**
     * 编辑代理商权限
     * @param array $params
     * @return string
     */
    public function editAgentPer($params = [])
    {
        return $this->parseJSON(static::POST,[self::EDIT_AGENT_PER,$params]);
    }

    /**
     * 添加代理商权限
     * @param array $params
     * @return string
     */
    public function addAgentPer($params = [])
    {
        return $this->parseJSON(static::POST,[self::ADD_AGENT_PER,$params]);
    }


}