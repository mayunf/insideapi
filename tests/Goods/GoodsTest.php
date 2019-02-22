<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2019/2/22
 * Time: 10:26.
 */

namespace InsideAPI\Test\Goods;

use InsideAPI\Test\TestCase;

class GoodsTest extends TestCase
{
    public function testGoodsList()
    {
        $res = $this->getInstance()->goods->goodsList();
        $this->assertArrayHasKey('head', $res);
    }
}
