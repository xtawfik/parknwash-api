<?php

namespace App\Containers\AccPurchaseQuote\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccSupplier\Models\AccSupplier;
use App\Containers\AccFooter\Models\AccFooter;
use App\Containers\AccItem\Models\AccItem;


class AccPurchaseQuote extends Model
{
    protected $fillable = [
      #Fillables#
		'footer_id',
		 'supplier_id',
		 'date',
		 'reference',
		 'description',
		 'title',
		 'status',
		 'amount',
		 'request_for_quotation',
		 'withholding_tax_type',
		 'withholding_tax',
		 'cancelled',
		 'show_item_image',
		 'sub_total',
		 'total',
		 'user_id',
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
    protected $resourceKey = 'accpurchasequotes';
    protected $table = 'acc_purchase_quote';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function supplier()
    {
        return $this->belongsTo(AccSupplier::class, 'supplier_id');
    }

    public function footer()
    {
        return $this->belongsTo(AccFooter::class, 'footer_id');
    }

    public function items()
    {
        return $this->hasMany(AccItem::class, 'purchase_quote_id');
    }


}

