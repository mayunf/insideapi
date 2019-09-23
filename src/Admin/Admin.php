<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/18
 * Time: 14:00.
 */

namespace InsideAPI\Admin;

use InsideAPI\Core\AbstractAPI;
use InsideAPI\Enum\EPlatform;

class Admin extends AbstractAPI
{
    const PRO_SEARCH = 'ins/v2/admin/productSearch'; //  获取产品列表

    const USER_ACC_DEL = 'ins/v2/admin/useraccdel'; //删除用户推广账户

    const USER_ACC_RETURN = 'ins/v2/admin/useraccreturn'; //  还原删除用户推广账户

    const USER_ACC = 'ins/v2/admin/useracc'; //  获取用户推广账户列表

    const USER_SEARCH = 'ins/v2/search/users'; //  获取用户（普通、客服、代理商）列表

    const SITE_ADD = 'ins/v2/admin/SiteAdd'; //  网站配置 - 添加

    const SITE_EDIT = 'ins/v2/admin/SiteEdit'; //  网站配置 - 编辑

    const SITE_DEL = 'ins/v2/admin/SiteDel'; //  网站配置 - 删除

    const SITE_INFO = 'ins/v2/admin/SiteInfo'; //  网站配置 - 详情

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
                'search'    => $search,
                'order'     => $order,
                'page'      => $page,
                'page_size' => $pageSize,
                'state'     => $state,
                'type'      => $type,
                'plat'      => $plat,
            ],
        ]);
    }

    /**
     * 删除用户推广账户.
     *
     * @param int   $uid 用户ID
     * @param array $ids 账户id
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
                'Uid' => $uid,
                'Ids' => $ids,
            ],
        ]);
    }

    /**
     * 还原删除用户推广账户.
     *
     * @param int   $uid 用户ID
     * @param array $ids 账户id
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
                'Uid' => $uid,
                'Ids' => $ids,
            ],
        ]);
    }

    /**
     *  获取用户推广账户列表.
     *
     * @param int $uid    用户ID
     * @param int $plat   平台类型（0 百度，1 点睛，2 搜狗，3 神马）
     * @param int $status 账户状态
     * @param int $role   账户角色
     *                    {"userid":13,"plat":-1,"status":1,"role":0}
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function userAcc(int $uid, int $plat, int $status, string $role)
    {
        return $this->parseJSON(static::POST, [
            self::USER_ACC,
            [
                'userid' => $uid,
                'Plat'   => $plat,
                'status' => $status,
                'role'   => $role,

            ],
        ]);
    }

    /**
     *  获取用户（普通、客服、代理商）列表.
     *
     * @param int    $page   页码
     * @param int    $size   页大小
     * @param string $search 搜索
     * @param int    $role   账户角色
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function searchusers(int $page = 1, int $size = 10, string $search = '', int $role = 2)
    {
        return $this->parseJSON(static::POST, [
            self::USER_SEARCH,
            [
                'page'      => $page,
                'page_size' => $size,
                'search'    => $search,
                'urole'     => $role,
            ],
        ]);
    }

    /**
     * @param int         $uid
     * @param string      $domain
     * @param int         $device
     * @param int         $status
     * @param int         $platform
     * @param int         $accId
     * @param string|null $accName
     * @param string|null $project
     * @param string|null $dashboard
     * @param int         $templateId
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function siteAdd(int $uid, string $domain, int $device = 0, int $status = 0, int $platform = EPlatform::ALL, int $accId = 0, string $accName = null, string $project = null, string $dashboard = null, int $templateId = 0)
    {
        return $this->parseJSON(static::POST, [
            self::SITE_ADD,
            [
                'Uid'       => $uid,
                'Domain'    => $domain,
                'Device'    => $device,
                'Status'    => $status,
                'Platform'  => $platform,
                'Accid'     => $accId,
                'AccName'   => $accName,
                'Project'   => $project,
                'Dashboard' => $dashboard,
                'Template'  => $templateId,
            ],
        ]);
    }

    public function siteEdit(int $id, int $status, int $device = 0, string $project = null, string $dashboard = null, int $templateId = 0)
    {
        return $this->parseJSON(static::POST, [
            self::SITE_EDIT,
            [
                'Id'        => $id,
                'Device'    => $device,
                'Status'    => $status,
                'Project'   => $project,
                'Dashboard' => $dashboard,
                'Template'  => $templateId,
            ],
        ]);
    }

    public function siteDel(int $id)
    {
        return $this->parseJSON(static::POST, [
            self::SITE_DEL,
            [
                'Id' => $id,
            ],
        ]);
    }

    public function siteInfo(int $id)
    {
        return $this->parseJSON(static::POST, [
            self::SITE_INFO,
            [
                'Id' => $id,
            ],
        ]);
    }
}
