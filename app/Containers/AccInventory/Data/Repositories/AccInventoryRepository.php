<?php

namespace App\Containers\AccInventory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccInventoryRepository
 */
class AccInventoryRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',
'user_id' => '=',

    ];

}
