<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/12
 * Time: 17:00.
 */

namespace InsideAPI\Models;

use InsideAPI\Models\Permission\PermissionDetails;

class EditAgentAccSet extends PermissionDetails
{
    public $Id; //代理商表递增ID

    public $UserCountTotal; //用户总数

    public $BaiduAccTotal; //百度总账户数量

    public $BaiduCostTotal; //百度总消耗数

    public $SogouAccTotal; //搜狗总账户数量

    public $SogouCostTotal; //搜狗总消耗数

    public $DianjingAccTotal; //点睛总账户数量

    public $DianjingCostTotal; //点睛总消耗数

    public $ShenmaAccTotal; //神马总账户数量

    public $ShenmaCostTotal; //神马总消耗数

    public function attributes()
    {
        return [
            'Id'                => (int) $this->Id,
            'UserCountTotal'    => (int) $this->UserCountTotal,
            'BaiduAccTotal'     => (int) $this->BaiduAccTotal,
            'BaiduCostTotal'    => $this->BaiduCostTotal,
            'SogouAccTotal'     => (int) $this->SogouAccTotal,
            'SogouCostTotal'    => $this->SogouCostTotal,
            'DianjingAccTotal'  => (int) $this->DianjingAccTotal,
            'DianjingCostTotal' => $this->DianjingCostTotal,
            'ShenmaAccTotal'    => (int) $this->ShenmaAccTotal,
            'ShenmaCostTotal'   => $this->ShenmaCostTotal,
        ];
    }
}
