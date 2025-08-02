<?php

namespace App\Containers\AccJournalEntry\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccJournalEntryRepository
 */
class AccJournalEntryRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'date' => '=',
'reference' => 'like',
'currency_id' => '=',
'description' => 'like',
'cash_transaction' => 'like',
'user_id' => '=',
'footer_id' => '=',
'status' => '=',
'accounts' => '=',
'debit' => 'like',
'credit' => 'like',

    ];

}
