<?php

namespace App\Containers\Contract\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ContractRepository
 */
class ContractRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'contract_number' => 'like',
'contract_name' => 'like',
'contract_type' => 'like',
'status' => '=',
'contract_start' => 'like',
'contract_end' => 'like',
'contract_period' => 'like',
'contract_owner' => 'like',
'contract_value' => 'like',
'email' => 'like',
'contact_number' => 'like',
'file' => 'like',

    ];

}
