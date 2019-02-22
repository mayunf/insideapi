<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2019/2/14
 * Time: 15:50.
 */

namespace InsideAPI\User;

use InsideAPI\Core\AbstractAPI;

class User extends AbstractAPI
{
    const PULSE = 'ins/v2/user/pulse'; // API心跳请求

    const IS_MOBILE = 'ins/v2/user/ismobile'; // 判断手机号是否存在

    const IS_EMAIL = 'ins/v2/user/isemail'; // 判断邮箱是否存在

    const SEND_SMS = 'ins/v2/user/sendsms'; // 发送短信

    const REGISTER = 'ins/v2/user/register'; // 用户注册

    const LOGON = 'ins/v2/user/logon'; // 用户登录

    const EXIT = 'ins/v2/user/exit'; // 用户退出登录

    const SET_USER = 'ins/v2/user/setuser'; // 设置当前用户

    const INFO = 'ins/v2/user/info'; // 获取用户信息

    const EDIT = 'ins/v2/user/edit'; // 编辑用户信息

    const EDIT_U_NAME = 'ins/v2/user/edituname'; // 编辑用户名称

    const EDIT_PWD_BY_OLD = 'ins/v2/user/editpwdbyold'; // 修改用户密码（根据旧密码）

    const EDIT_PWD = 'ins/v2/user/editpwd'; // 修改用户密码

    const ACC_ADD = 'ins/v2/user/accadd'; // 添加单个账户

    const ACC_ADDS = 'ins/v2/user/accadds'; // 添加多个账户

    const USERS = 'ins/v2/user/users'; // 获取子用户

    const USERS_BY_MOBILE = 'ins/v2/user/usersbymobile'; // 根据手机号获取用户信息

    /**
     * API 心跳.
     *
     * @param array $params
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function pulse($params = [])
    {
        return $this->parseJSON(static::POST, [self::PULSE, $params]);
    }

    /**
     * 判断手机号是否存在.
     *
     * @param string $m
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function isMobile(string $m)
    {
        return $this->parseJSON(static::POST, [
            self::IS_MOBILE,
            [
                'Mob' => $m,
            ],
        ]);
    }

    /**
     * 判断邮箱是否存在.
     *
     * @param string $e
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function isEmail(string $e)
    {
        return $this->parseJSON(static::POST, [
            self::IS_EMAIL,
            [
                'Email' => $e,
            ],
        ]);
    }

    /**
     * 发送短信
     *
     * @param string $m  手机号
     * @param int    $st 短信类型
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function sendSms(string $m, int $st = 0)
    {
        return $this->parseJSON(static::POST, [
            self::SEND_SMS,
            [
                'ST' => $st,
                'Mob'  => $m,
            ],
        ]);
    }

    /**
     * 提交用户注册信息.
     *
     * @param int    $pt  产品类型
     * @param string $m   手机号
     * @param string $pwd 用户密码
     * @param int    $isM 手机号是否验证过（0表示未验证，1表示验证成功）
     * @param int $agId   代理id
     * @param string $an  代理商用户名
     * @param string $un  用户名称
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function register(string $m, string $pwd, int $pt = 200, int $agId = 0, string $an = '', string $un = '', int $isM = 1)
    {
        return $this->parseJSON(static::POST, [
            self::REGISTER,
            [
                'Mob'   => $m,
                'IsM' => $isM,
                'Pwd' => $pwd,
                'Agid'  => $agId,
                'AgName'  => $an,
                'UName'  => $un,
                'SProid'  => $pt,
            ],
        ]);
    }

    /**
     * 用户登录.
     *
     * @param int    $proId  产品类型
     * @param int    $role   用户类型（0 代表小鹿用户；1 代表客户服务；2 代表代理商管理员）
     * @param string $un  用户名称
     * @param string $pwd 用户密码
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function logon(string $un, string $pwd, int $proId = 200, int $role = 0)
    {
        return $this->parseJSON(static::POST, [
            self::LOGON,
            [
                'UN'  => $un,
                'Pwd' => $pwd,
                'Proid'  => $proId,
                'Role'   => $role,
            ],
        ]);
    }

    /**
     * 设置当前用户.
     *
     * @param int $agId    当前代理商 ID
     * @param int $uId     用户 ID
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function setUser(int $agId, int $uId)
    {
        $response = $this->parseJSON(static::POST, [
            self::SET_USER,
            [
                'AgId' => $agId,
                'Uid'  => $uId,
            ],
        ]);
        if ($response['head']['s'] == 0) {
            $token[$this->accessToken->userIdKey] = $uId;
            $token[$this->accessToken->sessionKey] = $this->accessToken->getSessionId();
            $this->accessToken->setToken($token);
        }
        return $response;
    }


    /**
     * 退出登录
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function exit()
    {
        $response = $this->parseJSON(static::POST, [self::EXIT,[]]);

        if ($response['head']['s'] == 0) {
            $this->accessToken->removeToken();
        }

        return $response;
    }

    /**
     * 获取用户信息.
     *
     * @param array $params
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function info($params = [])
    {
        return $this->parseJSON(static::POST, [self::INFO, $params]);
    }

    /**
     * 编辑用户信息
     * {"UMainId":103,"UName":"","Company":"","WebSite":"","Province":"","City":"","County":"","Address":"","Industry":"","Mobile":"","Email":"","QQ":""}.
     *
     * @param array $params
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function edit($params = [])
    {
        return $this->parseJSON(static::POST, [self::EDIT, $params]);
    }

    /**
     * 编辑用户名称.
     *
     * @param int    $agentId 用户所属代理商信息（0 表示小鹿平台用户，大于0 表示指定代理商信息）
     * @param string $uName   用户名称
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function editUName(int $agentId, string $uName)
    {
        return $this->parseJSON(static::POST, [
            self::EDIT_U_NAME,
            [
                'AgentId' => $agentId,
                'UName'   => $uName,
            ],
        ]);
    }

    /**
     * 修改用户密码（根据旧密码）.
     *
     * @param int    $sProId 来源的产品ID
     * @param string $oldPwd 老密码
     * @param string $newPwd 新密码
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function editPwdByOld(int $sProId, string $oldPwd, string $newPwd)
    {
        return $this->parseJSON(static::POST, [
            self::EDIT_PWD_BY_OLD,
            [
                'SProId' => $sProId,
                'Old'    => $oldPwd,
                'Pwd'    => $newPwd,
            ],
        ]);
    }

    /**
     * 修改用户密码
     *
     * @param int    $sProId 来源的产品ID
     * @param string $newPwd 新密码
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function editPwd(int $sProId, string $newPwd)
    {
        return $this->parseJSON(static::POST, [
            self::EDIT_PWD,
            [
                'SProId' => $sProId,
                'Pwd'    => $newPwd,
            ],
        ]);
    }

    /**
     * 添加单个账户.
     *
     * @param int    $pro  产品类型
     * @param int    $plat 平台类型（0 百度，1 点睛，2 搜狗，3 神马）
     * @param int    $aId  账户ID
     * @param string $an   账户名称
     * @param string $ln   账户登录名称
     * @param string $lp   账户密码
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function accAdd(int $pro, int $plat, int $aId, string $an, string $ln, string $lp)
    {
        return $this->parseJSON(static::POST, [
            self::ACC_ADD,
            [
                'Pro'  => $pro,
                'Plat' => $plat,
                'AId'  => $aId,
                'AN'   => $an,
                'LN'   => $ln,
                'LP'   => $lp,
            ],
        ]);
    }

    /**
     *  添加多个账户 -- 具体参数参考添加单个账户.
     *
     * @param array $params
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function accAdds($params = [])
    {
        return $this->parseJSON(static::POST, [self::ACC_ADDS, $params]);
    }

    /**
     * 获取子用户.
     * @param int $page 页数
     * @param int $size 页大小
     * @param string $search 搜索内容
     * @param string $order 排序
     * @return \Mayunfeng\Supports\Collection
     */
    public function users(int $page = 1, int $size = 10, string $search = '', string $order = '')
    {
        return $this->parseJSON(static::POST, [self::USERS, [
            'page' => $page,
            'page_size' => $size,
            'search' => $search,
            'order' => $order,
        ]]);
    }

    /**
     * 根据手机号获取用户信息.
     *
     * @param string $mobile 手机号码
     * @param int    $role   角色（-1：全部；0：普通用户；1：代理商用户；2：代理商管理员）
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function userByMobile(string $mobile, int $role = -1)
    {
        return $this->parseJSON(static::POST, [self::USERS_BY_MOBILE, [
            'Role' => $role,
            'Mob' => $mobile,
        ]]);
    }
}
