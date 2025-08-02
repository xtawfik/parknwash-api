<?php

namespace App\Containers\AccHistory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccHistoryRepository
 */
class AccHistoryRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'date' => '=',
'action' => 'like',
'description' => 'like',
'user_id' => '=',

    ];

}
