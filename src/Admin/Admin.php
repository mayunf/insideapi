<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/18
 * Time: 14:00.
 */

namespace InsideAPI\Admin;

use InsideAPI\Core\AbstractAPI;

class Admin extends AbstractAPI
{
    const PRO_SEARCH = 'ins/v2/admin/productSearch'; //  获取产品列表

    const USER_ACC_DEL = 'ins/v2/admin/useraccdel'; //删除用户推广账户

    const USER_ACC_RETURN = 'ins/v2/admin/useraccreturn'; //  还原删除用户推广账户

    const USER_ACC = 'ins/v2/admin/useracc'; //  获取用户推广账户列表

    /**
     *  获取产品列表.
     *
     * @param string $search   搜索内容
     * @param string $order    排序字段
     * @param int    $page     搜索页码
     * @param int    $pageSize 一页显示的数据条数
     * @param int    $state    状态
     * @param int    $type     产品类型
     * @param int    $plat     平台
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function productSearch(string $search, string $order, int $page, int $pageSize, int $state, int $type, int $plat)
    {
        return $this->parseJSON(static::POST, [
            self::PRO_SEARCH,
            [
                'search'     => $search,
                'order'      => $order,
                'page'       => $page,
                'page_size'  => $pageSize,
                'state'      => $state,
                'type'       => $type,
                'plat'       => $plat,
            ],
        ]);
    }

    /**
     * 删除用户推广账户.
     *
     *@param int   $uid    用户ID
     *@param array $ids    账户id
     *
     *{"Uid":13,"Ids":[1]}
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function userAccStatus(int $uid, array $ids)
    {
        return $this->parseJSON(static::POST, [
            self::USER_ACC_DEL,
            [
                'Uid'    => $uid,
                'Ids'    => $ids,
            ],
        ]);
    }

    /**
     * 还原删除用户推广账户.
     *
     *@param int   $uid    用户ID
     *@param array $ids    账户id
     *
     *{"Uid":13,"Ids":[1]}
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function reductionUserAcc(int $uid, array $ids)
    {
        return $this->parseJSON(static::POST, [
            self::USER_ACC_RETURN,
            [
                'Uid'    => $uid,
                'Ids'    => $ids,
            ],
        ]);
    }

    /**
     *  获取用户推广账户列表.
     *
     *@param int     $uid     用户ID
     *@param int     $plat    平台类型（0 百度，1 点睛，2 搜狗，3 神马）
     *@param int     $status  账户状态
     *@param int     $role    账户角色
     * {"userid":13,"plat":-1,"status":1,"role":0}
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function userAcc(int $uid, int $plat, int $status, string $role)
    {
        return $this->parseJSON(static::POST, [
            self::USER_ACC,
            [
                'userid'      => $uid,
                'Plat'        => $plat,
                'status'      => $status,
                'role'        => $role,

            ],
        ]);
    }
}
