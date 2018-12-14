<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/9/3
 * Time: 14:27.
 */

namespace InsideAPI\Models\Permission;

class LookAdmin extends PermissionDetails
{
    public $IsHome; // 首页
    public $IsTm; // 模板管理
    public $IsDev; // 平台模板
    public $IsBase; // 基础配置
    public $IsMinaM; // 小程序管理
    public $IsAgentM; // 代理商管理
    public $IsHelp; // 帮助中心
    public $IsOther; // 其他功能

    public function attributes()
    {
        return [
            'IsHome'   => (bool) $this->IsHome,
            'IsTm'     => (bool) $this->IsTm,
            'IsDev'    => (bool) $this->IsDev,
            'IsBase'   => (bool) $this->IsBase,
            'IsMinaM'  => (bool) $this->IsMinaM,
            'IsAgentM' => (bool) $this->IsAgentM,
            'IsHelp'   => (bool) $this->IsHelp,
            'IsOther'  => (bool) $this->IsOther,
        ];
    }
}
