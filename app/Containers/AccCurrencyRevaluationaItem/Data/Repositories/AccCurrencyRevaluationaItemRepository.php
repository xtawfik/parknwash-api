<?php

namespace App\Containers\AccCurrencyRevaluationaItem\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccCurrencyRevaluationaItemRepository
 */
class AccCurrencyRevaluationaItemRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'currency_revaluation_id' => '=',
'profit_loss_account_id' => '=',
'balance_sheet_account_id' => '=',
'gain_loss_value' => 'like',
'control_account_id' => '=',
'description' => 'like',
'special_account_id' => '=',
'supplier_id' => '=',
'customer_id' => '=',
'employee_id' => '=',
'bank_account_id' => '=',
'capital_account_id' => '=',

    ];

}
