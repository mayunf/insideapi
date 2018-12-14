<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2018/1/10
 * Time: 18:13.
 */

namespace InsideAPI\Models;

use InsideAPI\Enum\EProductType;
use InsideAPI\Models\Permission\PermissionDetails;

class EditUserPer extends PermissionDetails
{
    public $UserId; // 用户ID
    public $UT; // 用户类型 (0 普通用户，1 试用用户， 2 正式用户)
    public $ProId; // 产品ID
    public $BDate; // 开始时间
    public $EDate; // 开始时间
    public $PerName; // 权限名称
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
        $this->Details = $detailsModel->formatData($this->Details);

        return $this->attributes();
    }

    public function attributes()
    {
        return [
            'UserId' => (int) $this->UserId,
            'UT'     => (int) $this->UT,
            'ProId'  => (int) $this->ProId,
            'BDate'  => $this->BDate,
//            'EDate' => date('Y-m-d H:i:s',strtotime($this->EDate) +3600*24-1),
            'EDate'   => date('Y-m-d H:i:s', strtotime($this->EDate)),
            'PerName' => $this->PerName,
            'Details' => $this->Details,
        ];
    }
}
