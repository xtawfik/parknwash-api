<?php

namespace App\Containers\CustodyData\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CustodyDataRepository
 */
class CustodyDataRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',
'category_id' => '=',

    ];

}
