<?php

namespace App\Containers\AccPayslipItem\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccPayslipItemRepository
 */
class AccPayslipItemRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',
'status' => '=',
'user_id' => '=',
'category_id' => '=',
'balance_sheet_acount_id' => '=',
'profit_loss_account_id' => '=',
'reporting_category_id' => '=',

    ];

}
