<?php

namespace App\Containers\AccForecast\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccForecastRepository
 */
class AccForecastRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'date' => '=',
'repeat' => '=',
'description' => 'like',
'amount' => 'like',
'status' => '=',
'growth' => 'like',

    ];

}
