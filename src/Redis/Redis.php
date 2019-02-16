<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2019/2/12
 * Time: 20:05
 */

namespace InsideAPI\Redis;

use InsideAPI\Core\AbstractAPI;

class Redis extends AbstractAPI
{

    const INDEX = 'ins/v2/redis/'; // 概览

    const BD_INFO = 'ins/v2/redis/bdinfo'; // 百度-账户数据初始化

    const BD_LOGON = 'ins/v2/redis/bdlogon'; // 百度-账户登录数据初始化

    const SG_INFO = 'ins/v2/redis/sginfo'; // 搜狗-账户数据初始化

    const SG_LOGON = 'ins/v2/redis/sglogon'; // 搜狗-账户登录数据初始化

    const DJ_INFO = 'ins/v2/redis/djinfo'; // 点睛-账户数据初始化

    const DJ_LOGON = 'ins/v2/redis/djlogon'; // 点睛-登录账户数据初始化

    const DJ_LOGON_AGENT = 'ins/v2/redis/djlogonagent'; // 点睛-代理商登录账户数据初始化

    const DJ_TOKEN_A = 'ins/v2/redis/jdtokena'; // 点睛-代理商Token数据初始化

    const SM_INFO = 'ins/v2/redis/sminfo'; // 神马-账户信息加载

    const SM_TOKEN = 'ins/v2/redis/smtoken'; // 神马-Token信息加载

    const SM_LOGON = 'ins/v2/redis/smlogon'; //  神马-Logon信息加载

    const FREE_PERS = 'ins/v2/redis/freepers'; // 小鹿-加载默认权限

    const PERS = 'ins/v2/redis/pers'; // 小鹿-加载全部权限

    const LEGALS = 'ins/v2/redis/legals'; // 小鹿-加载法务产品

    const CPU_INIT = 'ins/v2/redis/cpuinit'; // 小鹿-ComputerCpu初始化

    const MAC_ADDRESS_INIT = 'ins/v2/redis/macaddressinit'; // 小鹿-ComputerMacAddress初始化

    const OS_VERSION_INIT = 'ins/v2/redis/osversioninit'; // 小鹿-OSVersion初始化

    const SERVICE_PACK_INIT = 'ins/v2/redis/servicepackinit'; // 小鹿-ServicePack初始化

    const FRAME_WORK_INIT = 'ins/v2/redis/frameworkinit'; // 小鹿-Framework初始化

    const SYS_NAME_INIT = 'ins/v2/redis/sysnameinit'; // 小鹿-SystemName初始化

    public function index($params = [])
    {
        return $this->parseJSON(static::GET, [self::INDEX, $params]);
    }


    public function bdInfo($params = [])
    {
        return $this->parseJSON(static::GET, [self::BD_INFO, $params]);
    }

    public function bdLogon($params = [])
    {
        return $this->parseJSON(static::GET, [self::BD_LOGON, $params]);
    }


    public function sgInfo($params = [])
    {
        return $this->parseJSON(static::GET, [self::SG_INFO, $params]);
    }

    public function sgLogon($params = [])
    {
        return $this->parseJSON(static::GET, [self::SG_LOGON, $params]);
    }


    public function djInfo($params = [])
    {
        return $this->parseJSON(static::GET, [self::DJ_INFO, $params]);
    }

    public function djLogon($params = [])
    {
        return $this->parseJSON(static::GET, [self::DJ_LOGON, $params]);
    }

    public function djLogonAgent($params = [])
    {
        return $this->parseJSON(static::GET, [self::DJ_LOGON_AGENT, $params]);
    }

    public function djTokenA($params = [])
    {
        return $this->parseJSON(static::GET, [self::DJ_TOKEN_A, $params]);
    }


    public function smInfo($params = [])
    {
        return $this->parseJSON(static::GET, [self::SM_INFO, $params]);
    }

    public function smLogon($params = [])
    {
        return $this->parseJSON(static::GET, [self::SM_LOGON, $params]);
    }

    public function smToken($params = [])
    {
        return $this->parseJSON(static::GET, [self::SM_TOKEN, $params]);
    }


    public function freePers($params = [])
    {
        return $this->parseJSON(static::GET, [self::FREE_PERS, $params]);
    }

    public function pers($params = [])
    {
        return $this->parseJSON(static::GET, [self::PERS, $params]);
    }


    public function legals($params = [])
    {
        return $this->parseJSON(static::GET, [self::LEGALS, $params]);
    }


    public function cpuInit($params = [])
    {
        return $this->parseJSON(static::GET, [self::CPU_INIT, $params]);
    }

    public function macAddressInit($params = [])
    {
        return $this->parseJSON(static::GET, [self::MAC_ADDRESS_INIT, $params]);
    }

    public function osVersionInit($params = [])
    {
        return $this->parseJSON(static::GET, [self::OS_VERSION_INIT, $params]);
    }

    public function servicePackInit($params = [])
    {
        return $this->parseJSON(static::GET, [self::SERVICE_PACK_INIT, $params]);
    }

    public function frameWorkInit($params = [])
    {
        return $this->parseJSON(static::GET, [self::FRAME_WORK_INIT, $params]);
    }

    public function sysNameInit($params = [])
    {
        return $this->parseJSON(static::GET, [self::SYS_NAME_INIT, $params]);
    }

}
