<?php

namespace App\Containers\Partner\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class PartnerRepository
 */
class PartnerRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',
'phone' => 'like',
'percent' => 'like',
'total' => 'like',
'country_id' => '=',
'mall_id' => '=',

    ];

}
