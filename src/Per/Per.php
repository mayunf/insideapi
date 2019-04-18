<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/18
 * Time: 14:00.
 */

namespace InsideAPI\Per;

use InsideAPI\Core\AbstractAPI;

class Per extends AbstractAPI
{
    const PER_BY_ID = 'ins/v2/per/perbyid'; // 根据权限Id获取权限

    const PER_BY_UID = 'ins/v2/per/perbyuid'; //根据用户Id获取权限

    const ACC_PER_ADD = 'ins/v2/per/accperadd'; //  添加用户产品账户权限

    /**
     * 根据权限Id获取权限.
     *
     * @param string $perid 权限id
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function perById(string $perid)
    {
        return $this->parseJSON(static::POST, [
            self::PER_BY_ID,
            [
                'Perid'  => $perid,
            ],
        ]);
    }

    /**
     * 根据用户Id获取权限.
     *
     *@param array $proIds    产品id
     * @param int $uid 用户ID
     *{"Proids":[117],"Uid":13}
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function perByUid(array $proIds, int $uid)
    {
        return $this->parseJSON(static::POST, [
            self::PER_BY_UID,
            [
                'Uid'    => $uid,
                'Proids' => $proIds,
            ],
        ]);
    }

    /**
     *  添加用户产品账户权限.
     *
     *@param int     $uid     用户ID
     *@param string  $proid    产品id
     *@param int     $plat 平台类型（0 百度，1 点睛，2 搜狗，3 神马）
     *@param string   $bDate    开始时间
     *@param string   $eDate    结束时间
     * {"Proid":113,"Plat":1,"Uid":13,"BDate":"2019-03-05","EDate":"2020-03-05"}
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function accPerAdd(int $uid, string $proid, int $plat, string $bDate, string $eDate)
    {
        return $this->parseJSON(static::POST, [
            self::ACC_PER_ADD,
            [
                'Uid'      => $uid,
                'Proid'    => $proid,
                'Plat'     => $plat,
                'BDate'    => $bDate,
                'EDate '   => $eDate,
            ],
        ]);
    }
}
