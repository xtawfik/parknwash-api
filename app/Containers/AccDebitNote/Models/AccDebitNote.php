<?php

namespace App\Containers\AccDebitNote\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccItem\Models\AccItem;
use App\Containers\AccPurchaseInvoice\Models\AccPurchaseInvoice;
use App\Containers\User\Models\User;
use App\Containers\AccFooter\Models\AccFooter;
use App\Containers\AccSupplier\Models\AccSupplier;


class AccDebitNote extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'date',
		 'reference',
		 'supplier_id',
		 'purchase_invoice_id',
		 'description',
		 'amount',
		 'tax_inclusive',
		 'total',
		 'footer_id',
		 'sub_total'
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
    protected $resourceKey = 'accdebitnotes';
    protected $table = 'acc_debit_note';

    public function items()
    {
        return $this->hasMany(AccItem::class, 'debit_note_id');
    }

    public function purchase_invoice()
    {
        return $this->belongsTo(AccPurchaseInvoice::class, 'purchase_invoice_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function footer()
    {
        return $this->belongsTo(AccFooter::class, 'footer_id');
    }

    public function supplier()
    {
        return $this->belongsTo(AccSupplier::class, 'supplier_id');
    }


}

