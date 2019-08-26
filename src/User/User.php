<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2019/2/14
 * Time: 15:50.
 */

namespace InsideAPI\User;

use InsideAPI\Core\AbstractAPI;
use InsideAPI\Enum\ELogonType;
use InsideAPI\Enum\EPlatform;
use InsideAPI\Enum\EProductType;

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

    const OTHER_EDIT_U_NAME = 'ins/v2/user/otheredituname'; // 编辑其他用户名称

    const EDIT_PWD_BY_OLD = 'ins/v2/user/editpwdbyold'; // 修改用户密码（根据旧密码）

    const EDIT_PWD_BY_MOB = 'ins/v2/user/editpwdmob'; // 修改用户密码（根据手机号）

    const EDIT_PWD = 'ins/v2/user/editpwd'; // 修改用户密码

    const ACC_ADD = 'ins/v2/user/accadd'; // 添加单个推广账户

    const ACC_ADDS = 'ins/v2/user/accadds'; // 添加多个推广账户

    const ACC_EDIT = 'ins/v2/user/accedit'; // 编辑单个推广账户

    const ACC_DEL = 'ins/v2/user/accdel'; // 删除推广账户

    const ACC_LIST = 'ins/v2/user/acclist'; // 获取推广账户列表

    const PER_S = 'ins/v2/user/pers'; // 获取当前用户权限

    const PAYMENT = 'ins/v2/user/payment'; // 购买商品

    const PAYMENT_STATUS = 'ins/v2/user/paymentstatus'; // 获取购买商品状态

    const PA_INFO = 'ins/v2/user/painfo'; // 获取平台客服推广账户信息

    const PA_E_PWD = 'ins/v2/user/paepwd'; // 编辑平台客服推广账户信息

    const USERS = 'ins/v2/user/users'; // 获取子用户

    const USERS_BY_MOBILE = 'ins/v2/user/usersbymobile'; // 根据手机号获取用户信息

    const WX_LOGON = 'ins/v2/user/logonwx'; // 微信用户登录

    const WX_BIND = 'ins/v2/user/bindwx'; // 微信用户绑定

    const WX_DIS_BIND = 'ins/v2/user/disbindwx'; // 微信用户取消绑定

    const WX_IS_BIND = 'ins/v2/user/isbindwx'; // 微信用户是否绑定

    const SET_PER = 'ins/v2/user/setper'; // 开通商品权限

    const UPDATE_PAR_CODE = 'ins/v2/user/updateparcode'; // 更新邀请码

    const UPDATE_MOBILE = 'ins/v2/user/updatemobile'; // 更新绑定手机号

    const UPDATE_EMAIL = 'ins/v2/user/updateemail'; // 更新绑定邮箱
    const SITE_LIST = 'ins/v2/user/SiteList'; // [网站管理] - [获取网址配置列表]
    const SITE_URL = 'ins/v2/user/SiteUrl'; // [网站管理] - [获取网址]

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
                'ST'  => $st,
                'Mob' => $m,
            ],
        ]);
    }

    /**
     * 提交用户注册信息.
     *
     * @param int    $pt   产品类型
     * @param string $m    手机号
     * @param string $pwd  用户密码
     * @param int    $isM  手机号是否验证过（0表示未验证，1表示验证成功）
     * @param int    $agId 代理id
     * @param string $an   代理商用户名
     * @param string $un   用户名称
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function register(
        string $m,
        string $pwd,
        int $pt = 200,
        int $agId = 0,
        string $an = '',
        string $un = '',
        int $isM = 1
    ) {
        return $this->parseJSON(static::POST, [
            self::REGISTER,
            [
                'Mob'    => $m,
                'IsM'    => $isM,
                'Pwd'    => $pwd,
                'Agid'   => $agId,
                'AgName' => $an,
                'UName'  => $un,
                'SProid' => $pt,
            ],
        ]);
    }

    /**
     * 用户登录.
     *
     * @param int    $proId 产品类型
     * @param int    $role  用户类型（0 代表小鹿用户；1 代表客户服务；2 代表代理商管理员）
     * @param string $un    用户名称
     * @param string $pwd   用户密码
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function logon(string $un, string $pwd, int $proId = 200, int $role = 0)
    {
        return $this->parseJSON(static::POST, [
            self::LOGON,
            [
                'UN'    => $un,
                'Pwd'   => $pwd,
                'Proid' => $proId,
                'Role'  => $role,
            ],
        ]);
    }

    /**
     * 设置当前用户.
     *
     * @param int $agId 当前代理商 ID
     * @param int $uId  用户 ID
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function setUser(int $agId, int $uId)
    {
        $response = $this->parseJSON(static::POST, [
            self::SET_USER,
            [
                'Agid' => $agId,
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
     * 退出登录.
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function exit()
    {
        $response = $this->parseJSON(static::POST, [self::EXIT, []]);

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
                'Agid'  => $agentId,
                'UName' => $uName,
            ],
        ]);
    }

    /**
     * 编辑其他用户名称.
     *
     * @param int    $agentId 用户所属代理商信息（0 表示小鹿平台用户，大于0 表示指定代理商信息）
     * @param string $uName   用户名称
     * @param int    $uMainId 主ID
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function OtherEditUName(int $agentId, string $uName, int $uMainId)
    {
        return $this->parseJSON(static::POST, [
            self::OTHER_EDIT_U_NAME,
            [
                'UMid'  => $uMainId,
                'Agid'  => $agentId,
                'UName' => $uName,
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
     * 修改用户密码（根据手机号）.
     *
     * @param int    $sProId 来源的产品ID
     * @param string $mobile 手机号
     * @param string $newPwd 新密码
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function editPwdByMob(int $sProId, string $mobile, string $newPwd)
    {
        return $this->parseJSON(static::POST, [
            self::EDIT_PWD_BY_MOB,
            [
                'SProId' => $sProId,
                'Mobile' => $mobile,
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
     * @param string $pro  产品类型
     * @param int    $plat 平台类型（0 百度，1 点睛，2 搜狗，3 神马）
     * @param int    $aId  账户ID
     * @param string $an   账户名称
     * @param string $ln   账户登录名称
     * @param string $lp   账户密码
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function accAdd(string $pro, int $plat, int $aId, string $an, string $ln, string $lp)
    {
        return $this->parseJSON(static::POST, [
            self::ACC_ADD,
            [
                'Proid' => $pro,
                'Plat'  => $plat,
                'Aid'   => $aId,
                'AName' => $an,
                'LName' => $ln,
                'LPwd'  => $lp,
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
     * 编辑单个推广账户.
     *
     * @param string $pro  产品类型
     * @param int    $plat 平台类型（0 百度，1 点睛，2 搜狗，3 神马）
     * @param int    $aId  账户ID
     * @param string $an   账户名称
     * @param string $ln   账户登录名称
     * @param string $lp   账户密码
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function accEdit(string $pro, int $plat, int $aId, string $an, string $ln, string $lp)
    {
        return $this->parseJSON(static::POST, [
            self::ACC_ADD,
            [
                'Proid' => $pro,
                'Plat'  => $plat,
                'Aid'   => $aId,
                'AName' => $an,
                'LName' => $ln,
                'LPwd'  => $lp,
            ],
        ]);
    }

    /**
     * 删除推广账户.
     *
     * @param string $proId  产品类型
     * @param int    $plat   平台类型（0 百度，1 点睛，2 搜狗，3 神马）
     * @param array  $accIds 账户ID数组
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function accDel(array $accIds, string $proId = EProductType::XLTG_Web, int $plat = EPlatform::Baidu)
    {
        return $this->parseJSON(static::POST, [
            self::ACC_DEL,
            [
                'Proid'   => $proId,
                'Plat'    => $plat,
                'AccIds ' => $accIds,
            ],
        ]);
    }

    /**
     * 获取推广账户列表.
     *
     * @param array $plats  平台类型（0 百度，1 点睛，2 搜狗，3 神马）
     * @param array $proIds 产品类型
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function accList(array $plats = [], array $proIds = [])
    {
        return $this->parseJSON(static::POST, [
            self::ACC_LIST,
            [
                'Plats'   => $plats,
                'Proids ' => $proIds,
            ],
        ]);
    }

    /**
     * 获取当前用户权限.
     *
     * @param array $proIds 产品ID数组
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function perS(array $proIds)
    {
        return $this->parseJSON(static::POST, [
            self::PER_S,
            [
                'Proids' => $proIds,
            ],
        ]);
    }

    /**
     * 购买商品
     *
     * @param string $goodsId  商品ID
     * @param string $price    支付金额
     * @param int    $payWay   支付方式 1：支付宝 2：微信
     * @param int    $unit     支付单位： 1 月 ，2年
     * @param string $describe 订单描述
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function payment(string $goodsId, string $price, int $payWay = 1, int $unit = 2, string $describe = '')
    {
        return $this->parseJSON(static::POST, [
            self::PAYMENT,
            [
                'payway'   => $payWay,
                'goodsid'  => $goodsId,
                'price'    => $price,
                'unit'     => $unit,
                'describe' => $describe,
            ],
        ]);
    }

    /**
     * 获取当前用户权限.
     *
     * @param string $uniqueId 唯一ID
     * @param string $removeId 删除ID
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function paymentStatus(string $uniqueId, string $removeId)
    {
        return $this->parseJSON(static::POST, [
            self::PAYMENT_STATUS,
            [
                'uniqueid' => $uniqueId,
                'removeId' => $removeId,
            ],
        ]);
    }

    /**
     * 获取平台客服推广账户信息.
     *
     * @param int $id   代理商ID
     * @param int $plat 平台类型（0 百度，1 点睛，2 搜狗，3 神马）
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function paInfo(int $id, int $plat = 0)
    {
        return $this->parseJSON(static::POST, [
            self::PA_INFO,
            [
                'Plat' => $plat,
                'Id'   => $id,
            ],
        ]);
    }

    /**
     * 编辑平台客服推广账户信息.
     *
     * @param int    $proId  产品类型
     * @param int    $plat   平台类型（0 百度，1 点睛，2 搜狗，3 神马）
     * @param string $agName 代理商名称
     * @param string $agPwd  代理商密码
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function paEPwd(int $proId, int $plat, string $agName, string $agPwd)
    {
        return $this->parseJSON(static::POST, [
            self::PA_E_PWD,
            [
                'Proid'  => $proId,
                'Plat'   => $plat,
                'AgName' => $agName,
                'AgPwd'  => $agPwd,
            ],
        ]);
    }

    /**
     * 获取子用户.
     *
     * @param int    $page   页数
     * @param int    $size   页大小
     * @param string $search 搜索内容
     * @param string $order  排序
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function users(int $page = 1, int $size = 10, string $search = '', string $order = '')
    {
        return $this->parseJSON(static::POST, [
            self::USERS,
            [
                'page'      => $page,
                'page_size' => $size,
                'search'    => $search,
                'order'     => $order,
            ],
        ]);
    }

    /**
     * 根据手机号获取用户信息.
     *
     * @param string $mobile 手机号码
     * @param int    $role   角色（-1：全部；0：普通用户；1：代理商用户；2：代理商管理员）
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function userByMobile(string $mobile, int $role = ELogonType::All)
    {
        return $this->parseJSON(static::POST, [
            self::USERS_BY_MOBILE,
            [
                'Role' => $role,
                'Mob'  => $mobile,
            ],
        ]);
    }

    /**
     * 微信用户登录.
     *
     * @param string $unionId 微信关系ID
     * @param string $proId   产品类型
     * @param int    $role    用户类型（-1 未设置； 0 代表小鹿用户；1 代表客户服务；2 代表代理商管理员）
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function wxLogon(string $unionId, string $proId = EProductType::XLTG_Web, int $role = ELogonType::User)
    {
        return $this->parseJSON(static::POST, [
            self::WX_LOGON,
            [
                'Proid'   => $proId,
                'Role'    => $role,
                'UnionId' => $unionId,
            ],
        ]);
    }

    /**
     * 微信用户绑定.
     *
     * @param int    $uMid    用户主Id
     * @param string $unionId 微信关系ID
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function wxBind(int $uMid, string $unionId)
    {
        return $this->parseJSON(static::POST, [
            self::WX_BIND,
            [
                'UMainId' => $uMid,
                'UnionId' => $unionId,
            ],
        ]);
    }

    /**
     * 用户取消绑定微信
     *
     * @param int    $uMid    用户主Id
     * @param string $unionId 微信用户ID
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function wxDisBind(int $uMid, string $unionId)
    {
        return $this->parseJSON(static::POST, [
            self::WX_DIS_BIND,
            [
                'UMainId' => $uMid,
                'UnionId' => $unionId,
            ],
        ]);
    }

    /**
     * 微信用户是否绑定.
     *
     * @param string $unionId 微信用户unionid
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function wxIsBind(string $unionId)
    {
        return $this->parseJSON(static::POST, [
            self::WX_IS_BIND,
            [
                'UnionId' => $unionId,
            ],
        ]);
    }

    /**
     * 开通商品权限.
     *
     * @param int    $uid     用户ID
     * @param int    $goodsId 商品ID
     * @param int    $payDay  开通时间
     * @param string $realPay 付款金额
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function setPer(int $uid, int $goodsId, int $payDay, string $realPay)
    {
        return $this->parseJSON(static::POST, [
            self::SET_PER,
            [
                'Uid'     => $uid,
                'Goodsid' => $goodsId,
                'PayDay'  => $payDay,
                'RealPay' => $realPay,
            ],
        ]);
    }

    /**
     * 更新邀请码.
     *
     * @param string $code 付款金额
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function updateParCode(string $code)
    {
        return $this->parseJSON(static::POST, [
            self::UPDATE_PAR_CODE,
            [
                'Code' => $code,
            ],
        ]);
    }

    /**
     * 更新绑定手机号.
     *
     * @param string $mobile 手机号
     * @param bool   $isM    手机号是否验证过（0表示未验证，1表示验证成功）
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function updateMobile(string $mobile, bool $isM)
    {
        return $this->parseJSON(static::POST, [
            self::UPDATE_MOBILE,
            [
                'Mob' => $mobile,
                'IsM' => $isM,
            ],
        ]);
    }

    /**
     * 更新绑定邮箱.
     *
     * @param string $email   用户Email
     * @param bool   $isEmail 邮箱是否验证过（0表示为验证，1表示验证成功）
     *
     *{"Email":"lupeng@jwsem.com","IsEmail":True}
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function updateEmail(string $email, bool $isEmail)
    {
        return $this->parseJSON(static::POST, [
            self::UPDATE_EMAIL,
            [
                'Email'   => $email,
                'IsEmail' => $isEmail,
            ],
        ]);
    }

    /**
     * [网站管理] - [获取网址配置列表].
     *
     * @param int $platform 平台
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function siteList(int $platform = EPlatform::ALL)
    {
        return $this->parseJSON(static::POST, [
            self::SITE_LIST,
            [
                'Platform' => $platform,
            ],
        ]);
    }

    /**
     * [网站管理] - [获取网址].
     *
     * @param int    $id
     * @param string $bDate
     * @param string $eDate
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function siteUrl(int $id, $bDate = '', $eDate = '')
    {
        $params = [
            'Id' => $id,
        ];

        if (!empty($bDate) && !empty($eDate)) {
            $params['BDate'] = date('Y-m-d', time() - 3600 * 24 * 30);
            $params['EDate'] = date('Y-m-d', time());
        }

        return $this->parseJSON(static::POST, [
            self::SITE_URL,
            $params,
        ]);
    }
}
