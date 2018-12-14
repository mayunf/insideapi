<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/18
 * Time: 20:44.
 */

namespace InsideAPI\Models\Res;

use InsideAPI\Enum\EPerType;
use InsideAPI\Enum\EProductType;
use InsideAPI\Enum\EUserType;
use InsideAPI\Models\Permission\PermissionDetails;

class ResPermissions extends PermissionDetails
{
    public $ProId = EProductType::XLTG_Look; //产品类型 （Product）
    public $PerId; //权限ID （Perid）
    public $UT = EUserType::Free; // 用户类型（UserType）
    public $PerType = EPerType::Free; // 权限类型 （PerType）
    public $PName = ''; // 产品名称
    public $PerName = '免费版'; // 权限名称
    public $BDate; // 权限开始时间 默认值（2000-01-01）代表无
    public $EDate; // 权限结束时间 默认值（2000-01-01）代表无
    public $CDate; // 当前时间
    public $Details; // 权限细节

    /**
     * 接收post参数，自动组装需要的数据
     * EditUserPer constructor.
     *
     * @param $details
     *
     * @return array
     */
    public function formatData(array $details)
    {
        foreach ($details as $key=> $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
        $detailModelName = EProductType::getDetailsModel($this->ProId);
        /** @var PermissionDetails $detailsModel */
        $detailsModel = new $detailModelName();
        $this->Details = $detailsModel->formatData(json_decode($details['Details'], true));

        return $this->attributes();
    }

    public function attributes()
    {
        return [
            'ProId'   => (int) $this->ProId,
            'PerId'   => (int) $this->PerId,
            'UT'      => (int) $this->UT,
            'PerType' => (int) $this->PerType,
            'PName'   => $this->PName,
            'PerName' => $this->PerName,
            'BDate'   => $this->BDate,
            'EDate'   => $this->EDate,
            'CDate'   => $this->CDate,
            'Details' => $this->Details,
        ];
    }
}
