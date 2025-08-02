<?php

namespace App\Containers\PaymentMethod\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class PaymentMethodRepository
 */
class PaymentMethodRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',
'country_id' => '=',

    ];

}
