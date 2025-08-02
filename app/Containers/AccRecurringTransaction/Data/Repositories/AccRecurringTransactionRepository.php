<?php

namespace App\Containers\AccRecurringTransaction\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccRecurringTransactionRepository
 */
class AccRecurringTransactionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'date' => '=',
'interval_duration' => '=',
'interval_type' => 'like',
'description' => 'like',
'total' => 'like',
'show_total' => 'like',
'title' => 'like',
'until_type' => 'like',
'until_date' => '=',
'amount' => 'like',
'user_id' => '=',
'footer_id' => '=',
'category_id' => '=',
'employee_id' => '=',
'paid_from_bank_account_id' => '=',
'received_in_bank_account_id' => '=',
'currency_id' => '=',
'customer_id' => '=',
'supplier_id' => '=',
'paid_by_type' => '=',
'other_name' => 'like',
'due_date' => '=',
'billing_address' => 'like',
'from_date' => '=',

    ];

}
