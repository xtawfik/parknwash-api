<?php

namespace App\Containers\AccAssetEntryItem\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccAssetEntryItemRepository
 */
class AccAssetEntryItemRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'fixed_asset_id' => '=',
'intangible_asset_id' => '=',
'division_id' => '=',
'place_id' => '=',
'division_place_id' => '=',
'amount' => 'like',
'depreciation_entry_id' => '=',
'amortization_entry_id' => '=',

    ];

}
