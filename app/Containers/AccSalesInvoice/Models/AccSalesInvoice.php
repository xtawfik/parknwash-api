<?php

namespace App\Containers\AccSalesInvoice\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccItem\Models\AccItem;
use App\Containers\User\Models\User;
use App\Containers\AccFooter\Models\AccFooter;
use App\Containers\AccCustomer\Models\AccCustomer;
use App\Containers\AccSalesQuote\Models\AccSalesQuote;
use App\Containers\AccSalesOrder\Models\AccSalesOrder;
use App\Containers\AccInventory\Models\AccInventory;


class AccSalesInvoice extends Model
{
    protected $fillable = [
      #Fillables#
		'status',
		 'user_id',
		 'footer_id',
		 'customer_id',
		 'date',
		 'due_date',
		 'due_type',
		 'reference',
		 'billing_address',
		 'description',
		 'amount',
		 'title',
		 'sub_total',
		 'withholding_tax',
		 'total',
		 'cancelled',
		 'show_item_image',
		 'hide_total',
		 'withholding_tax_type',
		 'day',
		 'early_payment_discount',
		 'early_payment_discount_type',
		 'early_payment_discount_number',
		 'if_paid_within_day',
		 'late_payment_fee',
		 'charge_monthly',
		 'invoice_amount',
		 'balance_due',
		 'days_to_due_date',
		 'days_overdue',
		 'sales_quote_id',
		 'sales_order_id',
		 'inventory_id',
		 'money_staus'
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
    protected $resourceKey = 'accsalesinvoices';
    protected $table = 'acc_sales_invoice';

    public function items()
    {
        return $this->hasMany(AccItem::class, 'sales_invoice_id');
    }

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

    public function sales_order()
    {
        return $this->belongsTo(AccSalesOrder::class, 'sales_order_id');
    }

    public function inventory()
    {
        return $this->belongsTo(AccInventory::class, 'inventory_id');
    }


}

