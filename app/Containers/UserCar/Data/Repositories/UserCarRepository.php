<?php

namespace App\Containers\UserCar\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class UserCarRepository
 */
class UserCarRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'car_model_id' => '=',
'plate_number' => '=',
'plate_code' => '=',
'name' => 'like',
'car_type' => 'like',
'user_id' => '=',

    ];

}
