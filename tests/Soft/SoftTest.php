<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2019/2/14
 * Time: 14:13.
 */

namespace InsideAPI\Test\Soft;

use InsideAPI\Test\TestCase;

class SoftTest extends TestCase
{
    public function testAbout()
    {
        $res = $this->getInstance()->soft->about(114);
        $this->assertFalse(boolval($res['head']['s']), $res['head']['des']);
    }

    public function testAboutClear()
    {
        $res = $this->getInstance()->soft->aboutClear(114);
        $this->assertFalse(boolval($res['head']['s']), $res['head']['des']);
    }

    public function testConfig()
    {
        $res = $this->getInstance()->soft->config('pbiddingbaidu');
        $this->assertFalse(boolval($res['head']['s']), $res['head']['des']);
    }

    public function testConfigClear()
    {
        $res = $this->getInstance()->soft->configClear('pbiddingbaidu');
        $this->assertFalse(boolval($res['head']['s']), $res['head']['des']);
    }
}
