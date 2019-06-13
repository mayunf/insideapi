<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2019/2/22
 * Time: 10:17.
 */

namespace InsideAPI\Goods;

use InsideAPI\Core\AbstractAPI;

class Goods extends AbstractAPI
{
    const GOODS_LIST = 'ins/v2/goods/goodslist'; // 获取商品列表
    const GOODS_GET_LIST = 'ins/v2/goods/getlist'; //获取商品列表
    const GOODS_BY_TAGS = 'ins/v2/goods/goodsbytags'; //根据Tag获取商品列表
    const COUPONS = 'ins/v2/goods/coupons'; //获取优惠券信息
    const GOODS_OBJ = 'ins/v2/goods/getobjgoods'; //获取权限集合

    /**
     * 获取商品列表.
     *
     * @param int    $page     页码
     * @param int    $size     页大小
     * @param string $search   搜索
     * @param int    $proId    产品id
     * @param array  $goodsIds 商品id
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function goodsList(int $page = 1, int $size = 10, string $search = '', int $proId = 0, array $goodsIds = [])
    {
        return $this->parseJSON(static::POST, [
            self::GOODS_LIST,
            [
                'proid'     => $proId,
                'goodids'   => $goodsIds,
                'page'      => $page,
                'page_size' => $size,
                'search'    => $search,
            ],
        ]);
    }

    /**
     * 获取商品列表.
     *
     * @param array $goodsIds 商品id
     * @param array $proIds   产品id
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function getList(array $goodsIds = [], array $proIds = [])
    {
        return $this->parseJSON(static::POST, [
            self::GOODS_GET_LIST,
            [
                'Proids'   => $proIds,
                'Goodsids' => $goodsIds,
            ],
        ]);
    }

    /**
     * 根据Tag获取商品列表.
     *
     * @param array $tags 标签
     *                    {"Tags":["bidding","dianjing"]}
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function getGoodsByTags(array $tags = [])
    {
        return $this->parseJSON(static::POST, [
            self::GOODS_BY_TAGS,
            [
                'Tags'   => $tags,

            ],
        ]);
    }

    /**
     * 获取优惠券信息.
     *
     * @param int $objId  对象ID
     * @param int $uid    用户ID
     * @param int $gAid   商品价格ID
     * @param int $coupId 优惠券ID
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function getCoupons(int $objId, int $uid, int $gAid, int $coupId)
    {
        return $this->parseJSON(static::POST, [
            self::COUPONS,
            [
                'Objid'   => $objId,
                'Uid'     => $uid,
                'GAid'    => $gAid,
                'CoupId'  => $coupId,
            ],
        ]);
    }

    /**
     * 返回商品与权限列表.
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function getObjGoods()
    {
        return $this->parseJSON(static::POST, [
            self::GOODS_OBJ,
            [
				'data'=>[]
            ],
        ]);
    }
}
