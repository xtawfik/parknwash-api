<?php

namespace App\Containers\AccFixedAsset\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccControlAccount\Models\AccControlAccount;
use App\Containers\AccProfitLossAccount\Models\AccProfitLossAccount;
use App\Containers\AccAssetEntry\Models\AccAssetEntry;


class AccFixedAsset extends Model
{
    protected $fillable = [
      #Fillables#
		'code',
		 'name_en',
		 'name_ar',
		 'depreciation_rate',
		 'description',
		 'user_id',
		 'division_id',
		 'place_id',
		 'division_place_id',
		 'control_account_cost_id',
		 'control_account_depreciation_id',
		 'acquisition_cost',
		 'acccumulated_depreciation',
		 'profit_loss_account_id',
		 'date_disposal',
		 'disposal_account_id',
		 'status',
		 'book_value',
		 'depreciation'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $appends = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'accfixedassets';
    protected $table = 'acc_fixed_asset';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function division()
    {
        return $this->belongsTo(AccDivision::class, 'division_id');
    }

    public function place()
    {
        return $this->belongsTo(AccPlace::class, 'place_id');
    }

    public function division_place()
    {
        return $this->belongsTo(AccDivisionPlace::class, 'division_place_id');
    }

    public function control_account_cost()
    {
        return $this->belongsTo(AccControlAccount::class, 'control_account_cost_id');
    }

    public function control_acount_depreciation()
    {
        return $this->belongsTo(AccControlAccount::class, 'control_acount_depreciation_id');
    }

    public function profit_loss_account()
    {
        return $this->belongsTo(AccProfitLossAccount::class, 'profit_loss_account_id');
    }

    public function disposal_account()
    {
        return $this->belongsTo(AccProfitLossAccount::class, 'disposal_account_id');
    }

    public function entries()
    {
        return $this->belongsToMany(AccAssetEntry::class, 'fixed_asset_id', 'asset_entry_id', 'asset_entry_item_id');
    }


}

