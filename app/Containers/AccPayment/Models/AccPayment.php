<?php

namespace App\Containers\AccPayment\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccCustomer\Models\AccCustomer;
use App\Containers\AccSupplier\Models\AccSupplier;
use App\Containers\AccProfitLossAccount\Models\AccProfitLossAccount;
use App\Containers\AccItem\Models\AccItem;
use App\Containers\AccFooter\Models\AccFooter;
use App\Containers\AccBankAccount\Models\AccBankAccount;
use App\Containers\AccPurchaseInvoice\Models\AccPurchaseInvoice;
use App\Containers\AccInventory\Models\AccInventory;


class AccPayment extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'date',
		 'reference',
		 'description',
		 'bank_account_id',
		 'amount',
		 'paid_by_type',
		 'other_name',
		 'customer_id',
		 'supplier_id',
		 'total',
		 'fixed_total',
		 'out_of_balance',
		 'purchase_invoice_id',
		 'title',
		 'footer_id',
		 'inventory_id'
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
    protected $resourceKey = 'accpayments';
    protected $table = 'acc_payment';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function customer()
    {
        return $this->belongsTo(AccCustomer::class, 'customer_id');
    }

    public function supplier()
    {
        return $this->belongsTo(AccSupplier::class, 'supplier_id');
    }

    public function accounts()
    {
        return $this->hasMany(AccProfitLossAccount::class, 'payment_id');
    }

    public function items()
    {
        return $this->hasMany(AccItem::class, 'payment_id');
    }

    public function footer()
    {
        return $this->belongsTo(AccFooter::class, 'footer_id');
    }

    public function bank_account()
    {
        return $this->belongsTo(AccBankAccount::class, 'bank_account_id');
    }

    public function purchase_invoice()
    {
        return $this->belongsTo(AccPurchaseInvoice::class, 'purchase_invoice_id');
    }

    public function inventory()
    {
        return $this->belongsTo(AccInventory::class, 'inventory_id');
    }


}

