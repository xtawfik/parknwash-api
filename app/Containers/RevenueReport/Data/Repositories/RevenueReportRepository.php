<?php

namespace App\Containers\RevenueReport\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class RevenueReportRepository
 */
class RevenueReportRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'date' => '=',
'country_id' => '=',
'mall_id' => '=',
'jeep' => 'like',
'vip' => 'like',
'vvip' => 'like',
'subscription' => 'like',
'total_wash' => 'like',
'total_money' => 'like',
'expenses' => 'like',
'net_sale' => 'like',
'p_seat' => '=',
'p_gear' => 'like',
'p_steering' => 'like',
'p_mat' => '=',
'bag' => 'like',
'seat' => '=',
'gear' => 'like',
'steering' => 'like',

    ];

}
