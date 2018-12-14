<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/10
 * Time: 17:27.
 */

namespace InsideAPI\Models\Permission;

class Bid extends PermissionDetails
{
    public $TC; // 线程数
    public $KC; // 关键词数
    public $IsA; // 是否使用API
    public $IsP; // 是否使用实况 Is Preview
    public $IsS; // 是否使用搜索
    public $Quota; // 配额
    public $CSTB; // 单次定时调价
    public $CCCB; // 循环周期调价
    public $CGU; // 集团网址
    public $SUAC; // 加速账户数量
    public $CBP; // 出价备份
    public $CRK; // 替换关键词
    public $CBF; // 竞价文件夹
    public $CBFL; // 调词过滤
    public $BCC; // 百度通道
    public $IsM; // 调价使用内存模式

    public function attributes()
    {
        return [
            'TC'    => (int) $this->TC,
            'KC'    => (int) $this->KC,
            'IsA'   => (bool) $this->IsA,
            'IsP'   => (bool) $this->IsP,
            'IsS'   => (bool) $this->IsS,
            'Quota' => (int) $this->Quota,
            'CSTB'  => (bool) $this->CSTB,
            'CCCB'  => (bool) $this->CCCB,
            'CGU'   => (bool) $this->CGU,
            'SUAC'  => (int) $this->SUAC,
            'CBP'   => (bool) $this->CBP,
            'CRK'   => (bool) $this->CRK,
            'CBF'   => (bool) $this->CBF,
            'CBFL'  => (bool) $this->CBFL,
            'BCC'   => (int) $this->BCC,
            'IsM'   => (bool) $this->IsM,
        ];
    }
}
