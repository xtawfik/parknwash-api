<?php

namespace App\Containers\AccPurchaseInvoice\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccSupplier\Models\AccSupplier;
use App\Containers\AccPurchaseQuote\Models\AccPurchaseQuote;
use App\Containers\AccPurchaseOrder\Models\AccPurchaseOrder;
use App\Containers\AccFooter\Models\AccFooter;
use App\Containers\AccItem\Models\AccItem;


class AccPurchaseInvoice extends Model
{
    protected $fillable = [
      #Fillables#
		'status',
		 'user_id',
		 'footer_id',
		 'supplier_id',
		 'date',
		 'due_type',
		 'due_date',
		 'day',
		 'reference',
		 'description',
		 'title',
		 'sub_total',
		 'total',
		 'withholding_tax_type',
		 'withholding_tax',
		 'closed_invoice',
		 'show_item_image',
		 'show_withholding_tax',
		 'balance_due',
		 'days_to_due_date',
		 'days_overdue',
		 'sales_quote_id',
		 'sales_order_id'
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
    protected $resourceKey = 'accpurchaseinvoices';
    protected $table = 'acc_purchase_invoice';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function supplier()
    {
        return $this->belongsTo(AccSupplier::class, 'supplier_id');
    }

    public function purchase_quote()
    {
        return $this->belongsTo(AccPurchaseQuote::class, 'purchase_quote_id');
    }

    public function purchase_order()
    {
        return $this->belongsTo(AccPurchaseOrder::class, 'purchase_order_id');
    }

    public function footer()
    {
        return $this->belongsTo(AccFooter::class, 'footer_id');
    }

    public function items()
    {
        return $this->hasMany(AccItem::class, 'purchase_invoice_id');
    }


}

