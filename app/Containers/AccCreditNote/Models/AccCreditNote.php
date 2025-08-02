<?php

namespace App\Containers\AccCreditNote\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccSalesInvoice\Models\AccSalesInvoice;
use App\Containers\AccCustomer\Models\AccCustomer;
use App\Containers\User\Models\User;
use App\Containers\AccItem\Models\AccItem;
use App\Containers\AccFooter\Models\AccFooter;
use App\Containers\AccInventory\Models\AccInventory;


class AccCreditNote extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'customer_id',
		 'sales_invoice_id',
		 'inventory_id',
		 'footer_id',
		 'date',
		 'reference',
		 'description',
		 'amount',
		 'billing_address',
		 'tax_inclusive',
		 'amounts_are_tax_inclusive',
		 'withholding_tax_type',
		 'withholding_tax',
		 'title'
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
    protected $resourceKey = 'acccreditnotes';
    protected $table = 'acc_credit_note';

    public function sales_invoice()
    {
        return $this->belongsTo(AccSalesInvoice::class, 'sales_invoice_id');
    }

    public function customer()
    {
        return $this->belongsTo(AccCustomer::class, 'custmer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(AccItem::class, 'credit_note_id');
    }

    public function footer()
    {
        return $this->belongsTo(AccFooter::class, 'footer_id');
    }

    public function inventory()
    {
        return $this->belongsTo(AccInventory::class, 'inventory_id');
    }


}

