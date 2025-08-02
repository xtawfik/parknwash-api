<?php

namespace App\Containers\Loan\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class LoanRepository
 */
class LoanRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'mall_id' => '=',
'account_id' => '=',
'date' => '=',
'status' => '=',
'notes_en' => 'like',
'notes_ar' => 'like',

    ];

}
