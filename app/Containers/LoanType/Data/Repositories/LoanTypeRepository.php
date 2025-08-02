<?php

namespace App\Containers\LoanType\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class LoanTypeRepository
 */
class LoanTypeRepository extends Repository
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
