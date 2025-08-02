<?php

namespace App\Containers\AccPurchaseOrder\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccSupplier\Models\AccSupplier;
use App\Containers\AccPurchaseQuote\Models\AccPurchaseQuote;
use App\Containers\AccItem\Models\AccItem;


class AccPurchaseOrder extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'footer_id',
		 'supplier_id',
		 'cancelled',
		 'purchase_quote_id',
		 'date',
		 'reference',
		 'description',
		 'quantity_receive',
		 'amount',
		 'title',
		 'status',
		 'sub_total',
		 'total',
		 'withholding_tax_type',
		 'withholding_tax',
		 'show_item_image',
		 'delivery_status',
		 'invoice_amount',
		 'invoice_status',
		 'show_withholding_tax'
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
    protected $resourceKey = 'accpurchaseorders';
    protected $table = 'acc_purchase_order';

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

    public function items()
    {
        return $this->hasMany(AccItem::class, 'purchase_order_id');
    }


}

