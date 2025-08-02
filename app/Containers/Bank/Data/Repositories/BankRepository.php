<?php

namespace App\Containers\Bank\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class BankRepository
 */
class BankRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',

    ];

}
