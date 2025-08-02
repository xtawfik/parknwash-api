<?php

namespace App\Containers\AccCurrencyRevaluation\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccCurrencyRevaluationRepository
 */
class AccCurrencyRevaluationRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'date' => '=',
'total_item' => 'like',
'total_gain' => 'like',
'unrealized_gain' => 'like',
'description' => 'like',
'user_id' => '=',

    ];

}
