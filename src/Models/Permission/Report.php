<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/10
 * Time: 17:27.
 */

namespace InsideAPI\Models\Permission;

class Report extends PermissionDetails
{
    public $ISP; // 是否显示报告概览
    public $ISM; // 是否显示报告管理
    public $RT; // 报告周期
    public $RFT; // 报告文件类型
    public $IEmail; // 是否允许发送邮件
    public $ELCount; // 剩余邮件发送条数
    public $ISms; // 是否允许发送短信
    public $SLCount; // 短信发送剩余条数

    public function attributes()
    {
        if (is_array($this->RT)) {
            $this->RT = implode(',', $this->RT);
        } else {
            $this->RT = explode(',', $this->RT);
        }

        if (is_array($this->RFT)) {
            $this->RFT = implode(',', $this->RFT);
        } else {
            $this->RFT = explode(',', $this->RFT);
        }

        return [
            'ISP'     => (bool) $this->ISP,
            'ISM'     => (bool) $this->ISM,
            'RT'      => $this->RT,
            'RFT'     => $this->RT,
            'IEmail'  => (bool) $this->IEmail,
            'ELCount' => (int) $this->ELCount,
            'ISms'    => (bool) $this->ISms,
            'SLCount' => (int) $this->SLCount,
        ];
    }
}
