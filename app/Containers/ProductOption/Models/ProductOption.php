<?php

namespace App\Containers\ProductOption\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Product\Models\Product;
use App\Containers\OptionCategory\Models\OptionCategory;
use App\Containers\Option\Models\Option;
use App\Containers\Country\Models\Country;


class ProductOption extends Model
{
    protected $fillable = [
      #Fillables#
		'product_id',
		 'country_id',
		 'option_category_id',
		 'option_id',
		 'price'
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
    protected $resourceKey = 'productoptions';
    protected $table = 'product_option';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function option_category()
    {
        return $this->belongsTo(OptionCategory::class, 'option_category_id');
    }

    public function option()
    {
        return $this->belongsTo(Option::class, 'option_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


}

