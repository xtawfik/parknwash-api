<?php

namespace App\Containers\AccIntangibleAsset\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccIntangibleAssetRepository
 */
class AccIntangibleAssetRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'code' => 'like',
'name_en' => 'like',
'name_ar' => 'like',
'amortization_rate' => '=',
'description' => 'like',
'user_id' => '=',
'division_id' => '=',
'place_id' => '=',
'division_place_id' => '=',
'control_account_cost_id' => '=',
'control_account_amortization_id' => '=',
'acquisition_cost' => 'like',
'acccumulated_amortization' => '=',
'profit_loss_account_id' => '=',
'date_disposal' => '=',
'disposal_account_id' => '=',
'status' => '=',
'book_value' => 'like',
'amortization' => '=',

    ];

}
