<?php

namespace App\Containers\AccBankStatement\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccBankStatementRepository
 */
class AccBankStatementRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'bank_account_id' => '=',
'user_id' => '=',

    ];

}
