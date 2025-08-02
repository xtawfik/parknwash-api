<?php

namespace App\Containers\Deduction\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class DeductionRepository
 */
class DeductionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'mall_id' => '=',
'employee_id' => '=',
'account_id' => '=',
'type_id' => '=',
'amount' => 'like',
'date' => '=',
'status' => '=',
'notes_en' => 'like',
'notes_ar' => 'like',

    ];

}
