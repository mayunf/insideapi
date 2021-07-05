<?php
/**
 * Created by PhpStorm.
 * User: mayunfeng
 * Date: 2019/2/22
 * Time: 10:17.
 */

namespace InsideAPI\Account;

use InsideAPI\Core\AbstractAPI;

class Account extends AbstractAPI
{
    const ReportAccounCostTotal = 'ins/v2/acc/ReportAccounCostTotal'; // 账户报告 - 账户报告汇总统计 - 手机号

    /**
     * 获取商品列表.
     *
     * @param string $startDate 开始时间
     * @param string $endDate 结束时间
     * @param array $mobiles 手机号码
     *
     * @return \Mayunfeng\Supports\Collection
     */
    public function reportAccounCostTotal(string $startDate, string $endDate, array $mobiles = [])
    {
        return $this->parseJSON(static::POST, [
            self::ReportAccounCostTotal,
            [
                'startDate' => $startDate,
                'endDate' => $endDate,
                'mobiles' => $mobiles
            ],
        ]);
    }

}
