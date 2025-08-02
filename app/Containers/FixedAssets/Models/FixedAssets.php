<?php

namespace App\Containers\FixedAssets\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AssetCategory\Models\AssetCategory;
use App\Containers\Country\Models\Country;
use App\Containers\Mall\Models\Mall;


class FixedAssets extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar',
		 'date',
		 'price',
		 'description_en',
		 'description_ar',
		 'category_id',
		 'country_id',
		 'mall_id'
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
    protected $resourceKey = 'fixedassets';
    protected $table = 'fixed_assets';

    public function category()
    {
        return $this->belongsTo(AssetCategory::class, 'category_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }


}

