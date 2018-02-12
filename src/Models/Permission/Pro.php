<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/10
 * Time: 17:27
 */

namespace InsideAPI\Models\Permission;


class Pro extends PermissionDetails
{

        public $rl;// 规则ID

        public $bd;// 百度账户数量
        public $bdT;// 百度线程数量
        public $bdK;// 百度关键词数量
        public $bdm;// 百度管理模块

        public $qh;// 360账户数量
        public $qhT;// 360线程数量
        public $qhK;// 360关键词数量
        public $qhm;// 360管理模块\


        public $sg;// 搜狗账户数量
        public $sgT;// 搜狗线程数量
        public $sgK;// 搜狗关键词数量
        public $sgm;// 搜狗管理模块

        public $sm;// 神马账户数量
        public $smT;// 神马线程数量
        public $smK;// 神马关键词数量
        public $smm;// 神马管理模块

        public $skeyword;//关键词拓展
        public $sidea;// 创意拓展

        public $defence;// 防恶意点击


    public function attributes()
    {
        return [
            'rl' => (int)$this->rl,
            'bd' => (int)$this->bd,
            'bdT' => (int)$this->bdT,
            'bdK' => (int)$this->bdK,
            'bdm' => (boolean)$this->bdm,
            'qh' => (int)$this->qh,
            'qhT' => (int)$this->qhT,
            'qhK' => (int)$this->qhK,
            'qhm' => (boolean)$this->qhm,
            'sg' => (int)$this->sg,
            'sgT' => (int)$this->sgT,
            'sgK' => (int)$this->sgK,
            'sgm' => (boolean)$this->sgm,
            'sm' => (int)$this->sm,
            'smT' => (int)$this->smT,
            'smK' => (int)$this->smK,
            'smm' => (boolean)$this->smm,
            'skeyword' => (boolean)$this->skeyword,
            'sidea' => (boolean)$this->sidea,
            'defence' => (boolean)$this->defence,
        ];
    }
}