<?php

namespace App\Containers\AccAssetEntry\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccAssetEntryItem\Models\AccAssetEntryItem;
use App\Containers\AccFixedAsset\Models\AccFixedAsset;
use App\Containers\AccIntangibleAsset\Models\AccIntangibleAsset;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;


class AccAssetEntry extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'date',
		 'reference',
		 'description',
		 'amount'
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
    protected $resourceKey = 'accassetentries';
    protected $table = 'acc_asset_entry';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(AccAssetEntryItem::class, 'asset_entry_id');
    }

    public function fixed_assets()
    {
        return $this->hasMany(AccFixedAsset::class, 'asset_enter_id');
    }

    public function intangible_assets()
    {
        return $this->hasMany(AccIntangibleAsset::class, 'asset_enter_id');
    }

    public function division_places()
    {
        return $this->hasMany(AccDivisionPlace::class, 'asset_enter_id');
    }


}

