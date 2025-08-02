<?php

namespace App\Containers\AssetCategory\Models;

use App\Ship\Parents\Models\Model;

#use#

class AssetCategory extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar'
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
    protected $resourceKey = 'assetcategories';
    protected $table = 'asset_category';

    #relations#
}

