<?php

namespace App\Containers\Vendor\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class VendorRepository
 */
class VendorRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',
'phone' => 'like',
'company_name_en' => 'like',
'company_name_ar' => 'like',
'status' => '=',
'country_id' => '=',
'mall_id' => '=',
'city_id' => '=',
'address_en' => 'like',
'address_ar' => 'like',
'email' => 'like',
'balance' => 'like',
'tax_number' => 'like',

    ];

}
