<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/8
 * Time: 16:02.
 */

namespace InsideAPI\Enum;

class ELogonType
{
    const User = 0; // 普通用户
    const Agent = 1; // 代理商用户
    const Agent_manage = 2; // 代理商管理员
    const All = -1; // 全部
}
