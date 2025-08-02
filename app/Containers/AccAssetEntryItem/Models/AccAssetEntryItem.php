<?php

namespace App\Containers\AccAssetEntryItem\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccFixedAsset\Models\AccFixedAsset;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccAssetEntry\Models\AccAssetEntry;
use App\Containers\AccIntangibleAsset\Models\AccIntangibleAsset;


class AccAssetEntryItem extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'fixed_asset_id',
		 'intangible_asset_id',
		 'division_id',
		 'place_id',
		 'division_place_id',
		 'amount',
		 'depreciation_entry_id',
		 'amortization_entry_id'
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
    protected $resourceKey = 'accassetentryitems';
    protected $table = 'acc_asset_entry_item';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fixed_asset()
    {
        return $this->belongsTo(AccFixedAsset::class, 'fixed_asset_id');
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

    public function depreciation_entry()
    {
        return $this->belongsTo(AccAssetEntry::class, 'depreciation_entry_id');
    }

    public function amortization_entry()
    {
        return $this->belongsTo(AccAssetEntry::class, 'amortization_entry_id');
    }

    public function intangible_asset()
    {
        return $this->belongsTo(AccIntangibleAsset::class, 'intangible_asset_id');
    }


}

