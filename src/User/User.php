<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/2/22
 * Time: 14:25
 */

namespace InsideAPI\User;

use InsideAPI\Core\AbstractAPI;

class User extends AbstractAPI
{
    const GET_INFO = 'https://api.xiaolutuiguang.com/api/insideuser/getinfo';

    const EDIT = 'https://api.xiaolutuiguang.com/api/insideuser/edit';

    const EDIT_PWD = 'https://api.xiaolutuiguang.com/api/insideuser/editpwd';

    const EDIT_MAIL = 'https://api.xiaolutuiguang.com/api/insideuser/editemail';

    const EDIT_MOBILE = 'https://api.xiaolutuiguang.com/api/insideuser/editmobile';

    const GET_PERMISSIONS = 'https://api.xiaolutuiguang.com/api/insideuser/getpermissions';

    const GET_PERMISSIONS_ALL = 'https://api.xiaolutuiguang.com/api/insideuser/getpermissionsall';

    const GET_ACC_LIST = 'https://api.xiaolutuiguang.com/api/insideuser/acclist';

    const GET_ACC_LIST_HISTORY = 'https://api.xiaolutuiguang.com/api/insideuser/acclisthistory';

    const ACC_ADD = 'https://api.xiaolutuiguang.com/api/insideuser/accadd';

    const ACC_ADDS = 'https://api.xiaolutuiguang.com/api/insideuser/accadds';

    const ACC_EDIT = 'https://api.xiaolutuiguang.com/api/insideuser/accedit';

    const ACC_DELETE = 'https://api.xiaolutuiguang.com/api/insideuser/accdelete';

    const UNBIND_WX = 'https://api.xiaolutuiguang.com/api/insideuser/cancelbindweixin'; // 用户取消绑定微信

    const GET_GOODS = 'https://api.xiaolutuiguang.com/api/insideuser/getgoods'; // 获取商品列表

    const PAYMENT = 'https://api.xiaolutuiguang.com/api/insideuser/payment'; // 获取付款信息


    /**
     * @param array $params
     * @return \InsideAPI\Support\Collection
     */
    public function getInfo($params = [])
    {
        return $this->parseJSON(static::POST, [self::GET_INFO, $params]);
    }

    /**
     * 编辑用户信息 --Done
     * @param $params
     * @return \InsideAPI\Support\Collection
     */
    public function edit($params = [])
    {
        return $this->parseJSON(static::POST, [self::EDIT, $params]);
    }


    /**
     * 编辑用户信息 修改密码 --Done
     * @param $params = []
     * @return \InsideAPI\Support\Collection
     */
    public function editPwd($params = [])
    {
        return $this->parseJSON(static::POST, [self::EDIT_PWD, $params]);
    }

    /**
     * 编辑用户信息 修改手机号码--Done
     * @param $params = []
     * @return \InsideAPI\Support\Collection
     */
    public function editMobile($params = [])
    {
        return $this->parseJSON(static::POST, [self::EDIT_MOBILE, $params]);
    }


    /**
     * 编辑用户信息 修改邮箱--Done
     * @param $params = []
     * @return \InsideAPI\Support\Collection
     */
    public function editEmail($params = [])
    {
        return $this->parseJSON(static::POST, [self::EDIT_MAIL, $params]);
    }

    /**
     * 获取用户权限  ---Done
     * @param array $pros
     * @param int $AgentID
     * @return \InsideAPI\Support\Collection
     */
    public function getPermissions($pros = [], $AgentID = 0)
    {
        $params = [
            'AgentID' => $AgentID,
            'Pros' => $pros
        ];
        return $this->parseJSON(static::POST, [self::GET_PERMISSIONS, $params]);
    }

    public function getProducts($pros = [], $AgentID = 0)
    {
        $params = [
            'AgentID' => $AgentID,
            'Pros' => $pros
        ];
        return $this->parseJSON(static::POST, [self::GET_PERMISSIONS_ALL, $params]);
    }

    /**
     * 获取账户列表  ---Done
     * @param array $pros
     * @return \InsideAPI\Support\Collection
     */
    public function getAccList($pros = [])
    {
        $params = [
            'Pros' => $pros
        ];
        return $this->parseJSON(static::POST, [self::GET_ACC_LIST, $params]);
    }

    /**
     * 获取历史删除账户列表
     * @param array $pros
     * @return \InsideAPI\Support\Collection
     */
    public function getAccListHistory($pros = [])
    {
        $params = [
            'Pros' => $pros
        ];
        return $this->parseJSON(static::POST, [self::GET_ACC_LIST_HISTORY, $params]);
    }


    /**
     * 添加账户 ---Done
     * @param $params = []
     *    $params = [
     *      'Platform' => $userAcc->Platform,
     *      'PT' => $userAcc->PT,
     *      'AccID' => $userAcc->AccID,
     *      'AccName' => $userAcc->AccName,
     *      'LName' => $userAcc->LName,
     *      'Pwd' => $userAcc->Pwd,
     *  ];
     * @return \InsideAPI\Support\Collection
     */
    public function accAdd($params = [])
    {


        return $this->parseJSON(static::POST, [self::ACC_ADD, $params]);
    }

    /**
     * 批量添加账户
     * @param array $params
     * @return \InsideAPI\Support\Collection
     */
    public function accAdds($params = [])
    {
        return $this->parseJSON(static::POST, [self::ACC_ADDS, $params]);
    }

    /**
     * 编辑账户信息
     * @param $params = []
     *    $params = [
     *          'Platform' => $userAcc->Platform,
     *         'PT' => $userAcc->PT,
     *         'AccID' => $userAcc->AccID,
     *          'AccName' => $userAcc->AccName,
     *          'LName' => $userAcc->LName,
     *         'Pwd' => $userAcc->Pwd,
     *    ];
     * @return \InsideAPI\Support\Collection
     */
    public function accEdit($params = [])
    {

        return $this->parseJSON(static::POST, [self::ACC_EDIT, $params]);
    }

    /**
     * 删除账户
     * $params = [
     *      'Platform' => $userAcc->Platform,
     *      'PT' => $userAcc->PT,
     *      'AccID' => $userAcc->AccID,
     * ];
     * @param $params = [] 平台ID
     * @return \InsideAPI\Support\Collection
     */
    public function accDelete($params = [])
    {
        return $this->parseJSON(static::POST, [self::ACC_DELETE, $params]);
    }

    /**
     * 解绑微信
     * @return \InsideAPI\Support\Collection
     */
    public function unbindWx()
    {
        return $this->parseJSON(static::POST, [self::UNBIND_WX, []]);
    }

    /**
     * 获取商品列表
     * @param array $params
     * @return \InsideAPI\Support\Collection
     */
    public function getGoods($params = [])
    {
        return $this->parseJSON(static::POST, [self::GET_GOODS, $params]);
    }

    /**
     * 获取支付信息
     * @param array $params
     *
     *   $params = [
     *      'payway' => '支付方式 1：支付宝 2：微信',
     *      'goodsid' => '商品ID',
     *      'price' => '支付金额',
     *      'unit' => '支付单位： 1 月 ，2年',
     *      'describe' => '订单描述',
     *  ];
     * @return \InsideAPI\Support\Collection
     *
     *  $return = [
     *      'code_url' => '支付Url',
     *      'uniqueid' => '唯一ID'
     *  ]
     */
    public function payment($params = [])
    {
        return $this->parseJSON(static::POST, [self::PAYMENT, $params]);
    }



}
