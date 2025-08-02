<?php

namespace App\Containers\Custody\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CustodyRepository
 */
class CustodyRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'mall_id' => '=',
'employee_id' => '=',
'category_id' => '=',
'data_id' => '=',
'notes_en' => 'like',
'notes_ar' => 'like',
'number' => 'like',
'date' => '=',
'status' => '=',

    ];

}
