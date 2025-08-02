<?php

namespace App\Containers\AccSalesOrder\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccFooter\Models\AccFooter;
use App\Containers\AccCustomer\Models\AccCustomer;
use App\Containers\AccSalesQuote\Models\AccSalesQuote;
use App\Containers\AccItem\Models\AccItem;


class AccSalesOrder extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'footer_id',
		 'customer_id',
		 'sales_quote_id',
		 'date',
		 'reference',
		 'description',
		 'amount',
		 'billing_address',
		 'title',
		 'status',
		 'sub_total',
		 'withholding_tax',
		 'total',
		 'cancelled',
		 'show_item_image',
		 'hide_total',
		 'withholding_tax_type',
		 'quantity_delivery',
		 'delivery_status',
		 'invoice_amount',
		 'invoice_status',
		 'sales_quotes',
		 'closed_invoice'
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
    protected $resourceKey = 'accsalesorders';
    protected $table = 'acc_sales_order';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function footer()
    {
        return $this->belongsTo(AccFooter::class, 'footer_id');
    }

    public function customer()
    {
        return $this->belongsTo(AccCustomer::class, 'customer_id');
    }

    public function sales_quote()
    {
        return $this->belongsTo(AccSalesQuote::class, 'sales_quote_id');
    }

    public function items()
    {
        return $this->hasMany(AccItem::class, 'sales_order_id');
    }


}

