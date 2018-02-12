<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/10
 * Time: 17:27
 */

namespace InsideAPI\Models\Permission;


class Edit extends PermissionDetails
{

    public $IFZ = 100;// Import file size 导入文件大小 单位M ; -1无限制
    public $ITQH = false;// Import type qh360 导入 QH360
    public $ITBD = false;// Import type baidu 导入百度
    public $ITSM = false;// Import type Shenma 导入神马
    public $ITSG = false;// Import type Sogou 导入搜狗
    public $FB = false;// Fengwu batch 凤舞批量
    public $CC = 2000;// copy count 复制数量; -1无限制
    public $BT = false;// Background task 后台任务
    public $DA = false;// 删除重提



    public function attributes()
    {
        return [
            'IFZ' => (int)$this->IFZ,
            'ITQH' => (boolean)$this->ITQH,
            'ITBD' => (boolean)$this->ITBD,
            'ITSM' => (boolean)$this->ITSM,
            'ITSG' => (boolean)$this->ITSG,
            'FB' => (boolean)$this->FB,
            'CC' => (int)$this->CC,
            'BT' => (boolean)$this->BT,
            'DA' => (boolean)$this->DA,
        ];
    }
}