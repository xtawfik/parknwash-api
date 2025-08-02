<?php

namespace App\Containers\AccInvestmentRevaluation\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccInvestmentRevaluationRepository
 */
class AccInvestmentRevaluationRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'date' => '=',
'reference' => 'like',
'description' => 'like',
'fixed_asset_id' => '=',
'realized_gain' => 'like',
'division_id' => '=',
'place_id' => '=',
'division_place_id' => '=',

    ];

}
