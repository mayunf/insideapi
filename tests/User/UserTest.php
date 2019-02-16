<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/12/6
 * Time: 11:37
 */

namespace InsideAPI\Test\User;

use InsideAPI\Test\TestCase;

class UserTest extends TestCase
{
    public function testLogon()
    {
        $res = $this->getInstance()->user->logon('18137813353','ff84643364');
        $this->assertFalse(boolval($res['head']['s']),$res['head']['des']);
    }

    public function testGenToken()
    {
        $res = $this->getInstance()->access_token->getToken('18137813353','ff84643364');
        $this->assertArrayHasKey('Uid',$res);
    }


    public function testIsMobile()
    {
        $res = $this->getInstance()->user->isMobile('18137813353');
        $this->assertArrayHasKey('head',$res);
    }

    public function testIsEmail()
    {
        $res = $this->getInstance()->user->isMobile('mayunfeng@jwsem.com');
        $this->assertArrayHasKey('head',$res);
    }
    public function testPulse()
    {
        $res = $this->getInstance(5512)->user->pulse();
        $this->assertFalse(boolval($res['head']['s']),$res['head']['des']);
    }

    public function testInfo()
    {
        $res = $this->getInstance(5512)->user->info();
        $this->assertFalse(boolval($res['head']['s']),$res['head']['des']);
    }

//    public function testSendSms()
//    {
//        $res = $this->getInstance()->user->sendSms('18137813353');
//        $this->assertFalse(boolval($res['head']['s']),$res['head']['des']);
//    }

//    public function testRegister()
//    {
//        $res = $this->getInstance()->user->register('15637192429','111111');
//        $this->assertFalse(boolval($res['head']['s']),$res['head']['des']);
//    }
//
//    public function testRegisterAu()
//    {
//        $res = $this->getInstance()->user->registerAu('15637192429','111111','代理商名称');
//        $this->assertFalse(boolval($res['head']['s']),$res['head']['des']);
//    }
//    public function testSetUser()
//    {
//        $res = $this->getInstance()->user->setUser(1,1,123);
//        $this->assertFalse(boolval($res['head']['s']),$res['head']['des']);
//    }
//
//    public function testEdit()
//    {
//
//    }
//
//    public function testEditName()
//    {
//
//    }
//
//    public function testEditPwdByOld()
//    {
//
//    }
//
//    public function testEditPwd()
//    {
//
//    }
//
//    public function testAccAdd()
//    {
//
//    }
//    public function testAccAdds()
//    {
//
//    }


}
