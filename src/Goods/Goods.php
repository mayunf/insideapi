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
    public function goodsList(array $goodsIds = [],int $proId = 0,string $search = '',int $page = 1, int $size = 10)
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
}
