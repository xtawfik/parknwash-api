<?php

namespace App\Containers\AccInvestmentRevaluationItem\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccInvestmentRevaluationItemRepository
 */
class AccInvestmentRevaluationItemRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'investment_id' => '=',
'realized_gain' => 'like',
'investment_revaluation_id' => '=',

    ];

}
