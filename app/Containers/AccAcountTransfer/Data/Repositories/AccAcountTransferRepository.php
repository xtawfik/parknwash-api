<?php

namespace App\Containers\AccAcountTransfer\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccAcountTransferRepository
 */
class AccAcountTransferRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'date' => '=',
'refrence' => 'like',
'description' => 'like',
'paid_from_bank_account_id' => '=',
'amount' => 'like',
'received_in_bank_account_id' => '=',
'footer_id' => '=',
'cleared_type' => 'like',
'cleared_at' => '=',

    ];

}
