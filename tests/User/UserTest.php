<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/12/6
 * Time: 11:37.
 */

namespace InsideAPI\Test\User;

use InsideAPI\Test\TestCase;

class UserTest extends TestCase
{
    public function testLogin()
    {
        $a = [];

        $this->assertArrayNotHasKey('error', $a);
    }
}
