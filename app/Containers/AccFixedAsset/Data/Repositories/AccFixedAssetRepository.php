<?php

namespace App\Containers\AccFixedAsset\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccFixedAssetRepository
 */
class AccFixedAssetRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'code' => 'like',
'name_en' => 'like',
'name_ar' => 'like',
'depreciation_rate' => '=',
'description' => 'like',
'user_id' => '=',
'division_id' => '=',
'place_id' => '=',
'division_place_id' => '=',
'control_account_cost_id' => '=',
'control_account_depreciation_id' => '=',
'acquisition_cost' => 'like',
'acccumulated_depreciation' => '=',
'profit_loss_account_id' => '=',
'date_disposal' => '=',
'disposal_account_id' => '=',
'status' => '=',
'book_value' => 'like',
'depreciation' => '=',

    ];

}
