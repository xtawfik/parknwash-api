<?php

namespace App\Containers\CategoryCountry\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Country\Models\Country;
use App\Containers\Category\Models\Category;


class CategoryCountry extends Model
{
    protected $fillable = [
      #Fillables#
		'country_id',
		 'category_id'
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
    protected $resourceKey = 'categorycountries';
    protected $table = 'category_country';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


}

