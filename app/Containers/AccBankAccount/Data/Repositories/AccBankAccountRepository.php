<?php

namespace App\Containers\AccBankAccount\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccBankAccountRepository
 */
class AccBankAccountRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'name' => 'like',
'code' => 'like',
'currency_id' => '=',
'division_id' => '=',
'place_id' => '=',
'division_place_id' => '=',
'control_account_id' => '=',
'starting_balance' => 'like',
'iban' => 'like',
'have_pending_transaction' => 'like',
'credit_limit' => 'like',
'status' => '=',
'uncategorized_receipt' => '=',
'uncategorized_payment' => '=',
'cleared_balance' => 'like',
'pending_deposit' => 'like',
'pending_withdrawal' => 'like',
'actual_balance' => 'like',
'last_bank_reconciliation' => '=',
'available_credit' => 'like',

    ];

}
