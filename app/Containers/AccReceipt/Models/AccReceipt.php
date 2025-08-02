<?php

namespace App\Containers\AccReceipt\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccBankAccount\Models\AccBankAccount;
use App\Containers\AccCustomer\Models\AccCustomer;
use App\Containers\AccSupplier\Models\AccSupplier;
use App\Containers\User\Models\User;
use App\Containers\AccProfitLossAccount\Models\AccProfitLossAccount;
use App\Containers\AccItem\Models\AccItem;
use App\Containers\AccFooter\Models\AccFooter;
use App\Containers\AccSalesInvoice\Models\AccSalesInvoice;
use App\Containers\AccInventory\Models\AccInventory;


class AccReceipt extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'date',
		 'reference',
		 'paid_by_type',
		 'other_name',
		 'customer_id',
		 'supplier_id',
		 'bank_account_id',
		 'description',
		 'total',
		 'fixed_total',
		 'sales_invoice_id',
		 'out_of_balance',
		 'amount',
		 'title',
		 'footer_id',
		 'cleared_at',
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
    protected $resourceKey = 'accreceipts';
    protected $table = 'acc_receipt';

    public function bank_account()
    {
        return $this->belongsTo(AccBankAccount::class, 'bank_account_id');
    }

    public function customer()
    {
        return $this->belongsTo(AccCustomer::class, 'customer_id');
    }

    public function supplier()
    {
        return $this->belongsTo(AccSupplier::class, 'supplier_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function accounts()
    {
        return $this->hasMany(AccProfitLossAccount::class, 'receipt_id');
    }

    public function items()
    {
        return $this->hasMany(AccItem::class, 'receipt_id');
    }

    public function footer()
    {
        return $this->belongsTo(AccFooter::class, 'footer_id');
    }

    public function sales_invoice()
    {
        return $this->belongsTo(AccSalesInvoice::class, 'sales_invoice_id');
    }

    public function inventory()
    {
        return $this->belongsTo(AccInventory::class, 'inventory_id');
    }


}

