<?php

namespace App\Containers\AccSalesQuote\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccItem\Models\AccItem;
use App\Containers\User\Models\User;
use App\Containers\AccCustomer\Models\AccCustomer;
use App\Containers\AccFooter\Models\AccFooter;


class AccSalesQuote extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'footer_id',
		 'customer_id',
		 'date',
		 'expiry_date',
		 'valid_days',
		 'reference',
		 'billing_address',
		 'description',
		 'amount',
		 'title',
		 'status',
		 'sub_total',
		 'withholding_tax',
		 'total',
		 'cancelled',
		 'show_item_image',
		 'hide_total',
		 'withholding_tax_type'
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
    protected $resourceKey = 'accsalesquotes';
    protected $table = 'acc_sales_quote';

    public function items()
    {
        return $this->hasMany(AccItem::class, 'sales_quote_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function customer()
    {
        return $this->belongsTo(AccCustomer::class, 'customer_id');
    }

    public function footer()
    {
        return $this->belongsTo(AccFooter::class, 'footer_id');
    }


}

