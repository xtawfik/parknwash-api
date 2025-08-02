<?php

namespace App\Containers\AccInvestment\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccInvestmentRepository
 */
class AccInvestmentRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'currency_id' => '=',
'control_account_id' => '=',
'code' => 'like',
'name_en' => 'like',
'name_ar' => 'like',
'market_price' => 'like',
'quantity' => 'like',
'total_cost' => 'like',
'status' => '=',
'average_cost' => 'like',
'market_value' => 'like',
'unrealized_gain' => 'like',

    ];

}
