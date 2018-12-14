<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/10
 * Time: 17:27.
 */

namespace InsideAPI\Models\Permission;

class Assist extends PermissionDetails
{
    public $IsEditor; //是否显示编辑器
    public $IsBid; // 是否显示竞价
    public $IsReport; // 是否显示报告
    public $IsWX; // 是否显示微信小程序

    public function attributes()
    {
        return [
            'IsEditor' => (bool) $this->IsEditor,
            'IsBid'    => (bool) $this->IsBid,
            'IsReport' => (bool) $this->IsReport,
            'IsWX'     => (bool) $this->IsWX,
        ];
    }
}
