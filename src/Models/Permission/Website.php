<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/23
 * Time: 9:42
 */

namespace InsideAPI\Models\Permission;


class Website extends PermissionDetails
{

    public $IsUse; // 是否具有权限管理工具的权限

    public $IsUser; // 是否具有用户授权功能

    public $IsAgent; // 是否具有代理商权授权功能

    public $IsSys;  // 是否具有系统权限管理功能

    public $IsAP; // 是否具有审核试用申请功能

    public $IsMAU; // 是否管理代理商用户权限

    public $IsDB; // 是否可以删除余额

    public $IsDA; // 是否可以删除用户下的账户

    public function attributes()
    {
        return [
            'IsUse' => (boolean)$this->IsUse,
            'IsSys' => (boolean)$this->IsSys,
            'IsAgent' => (boolean)$this->IsAgent,
            'IsUser' => (boolean)$this->IsUser,
            'IsAP' => (boolean)$this->IsAP,
            'IsMAU' => (boolean)$this->IsMAU,
            'IsDB' => (boolean)$this->IsDB,
            'IsDA' => (boolean)$this->IsDA,
        ];
    }
}