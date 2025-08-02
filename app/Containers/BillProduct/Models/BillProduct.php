<?php

namespace App\Containers\BillProduct\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Bill\Models\Bill;
use App\Containers\Product\Models\Product;
use App\Containers\Country\Models\Country;
use App\Containers\Mall\Models\Mall;


class BillProduct extends Model
{
    protected $fillable = [
      #Fillables#
		'bill_id',
		 'product_id',
		 'amount',
		 'price',
		 'total',
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
    protected $resourceKey = 'billproducts';
    protected $table = 'bill_product';

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
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

