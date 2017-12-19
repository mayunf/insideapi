<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2017/11/22
 * Time: 15:52
 */

namespace InsideApi\Agent;


use InsideApi\Core\AbstractAPI;

class AgentAPI extends AbstractAPI
{


    const USER_ADD = 'https://api.xiaolutuiguang.com/api/insideagent/useradd';

    const USER_LIST = 'https://api.xiaolutuiguang.com/api/insideagent/userlist';

    const USER_EDIT = 'https://api.xiaolutuiguang.com/api/insideagent/useredit';

    const USER_DELETE = 'https://api.xiaolutuiguang.com/api/insideagent/userdelete';



    /**
     * 添加代理商下用户信息
     * @param array $params
     * @return string
     */
    public function userAdd($params = [])
    {
        return $this->parseJSON(static::POST,[self::USER_ADD,$params]);
    }

    /**
     * 获取代理商下用户列表
     * @param array $params
     * @return string
     */
    public function userEdit($params = [])
    {
        return $this->parseJSON(static::POST,[self::USER_EDIT,$params]);
    }

    /**
     * 获取用户权限
     * @param array $params
     * @return string
     */
    public function userDelete($params = [])
    {
        return $this->parseJSON(static::POST,[self::USER_DELETE,$params]);
    }
}