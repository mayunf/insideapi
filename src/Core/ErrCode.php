<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2017/11/27
 * Time: 20:37
 */

namespace InsideAPI\Core;


class ErrCode
{

    public static function getErrMsg($code)
    {
        switch ($code){
            case 1001:
                $errMsg = '系统错误';
                break;
            case 1002:
                $errMsg = '请求IP不在安全范围内（IP白名单）';
                break;
            case 1003:
                $errMsg = '请求IP在排除的范围内（IP黑名单）';
                break;
            case 1004:
                $errMsg = '请求数据不能为空';
                break;
            case 1005:
                $errMsg = '请求数据不合法';
                break;
            case 1006:
                $errMsg = '请求时间不能为空';
                break;
            case 1007:
                $errMsg = '请求时间不合法';
                break;
            case 2001:
                $errMsg = '令牌（token）不能为空';
                break;
            case 2002:
                $errMsg = '令牌（token）已经过期';
                break;
            case 2003:
                $errMsg = '令牌（token）不合法';
                break;
            case 2010:
                $errMsg = '用户未登录';
                break;
            case 2011:
                $errMsg = '访问令牌（Accesstoken）不能为空';
                break;
            case 2012:
                $errMsg = '访问令牌（Accesstoken）不合法';
                break;
            case 100001:
                $errMsg = '用户登录名为空';
                break;
            case 100002:
                $errMsg = '用户登录密码为空';
                break;
            case 100003:
                $errMsg = '用户登录名不合法';
                break;
            case 100004:
                $errMsg = '登录密码错误';
                break;
            case 100005:
                $errMsg = '登录手机号不存在';
                break;
            case 100006:
                $errMsg = '登录邮箱不存在';
                break;
            case 100101:
                $errMsg = '用户手机号无效';
                break;
            case 100102:
                $errMsg = '手机号已经存在';
                break;
            case 100201:
                $errMsg = '用户邮箱无效';
                break;
            case 100202:
                $errMsg = '用户邮箱已经存在';
                break;
            case 100301:
                $errMsg = '用户手机号无效';
                break;
            case 100302:
                $errMsg = '发送短信超出了限制';
                break;
            case 100303:
                $errMsg = '发送短信太频繁';
                break;
            case 100304:
                $errMsg = '发送短信失败';
                break;
            case 100401:
                $errMsg = '用户手机号已经存在';
                break;
            case 100402:
                $errMsg = '用户手机号不能为空';
                break;
            case 100403:
                $errMsg = '用户手机号无效';
                break;
            case 100404:
                $errMsg = '短信验证失败';
                break;
            case 100405:
                $errMsg = '登录密码为空';
                break;
            case 100406:
                $errMsg = '用户主ID注册错误';
                break;
            case 100407:
                $errMsg = '登录手机号注册错误';
                break;
            case 100408:
                $errMsg = '注册失败';
                break;
            case 100501:
                $errMsg = '用户手机号已经存在';
                break;
            case 100502:
                $errMsg = '用户手机号不能为空';
                break;
            case 100503:
                $errMsg = '用户手机号无效';
                break;
            case 100504:
                $errMsg = '短信验证失败';
                break;
            case 100505:
                $errMsg = '登录密码为空';
                break;
            case 100506:
                $errMsg = '用户主ID注册错误';
                break;
            case 100507:
                $errMsg = '登录手机号注册错误';
                break;
            case 100508:
                $errMsg = '注册失败';
                break;
            case 100509:
                $errMsg = '用户自动注册代理商错误';
                break;

            default:
                $errMsg = '未知错误';

        }
        return $errMsg;
    }
}
