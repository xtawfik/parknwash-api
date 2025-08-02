<?php

namespace App\Containers\AccTaxCodeCustom\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccTaxCodeCustomRepository
 */
class AccTaxCodeCustomRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
'rate' => '=',
'balance_sheet_account_id' => '=',
'user_id' => '=',
'tax_code_id' => '=',

    ];

}
