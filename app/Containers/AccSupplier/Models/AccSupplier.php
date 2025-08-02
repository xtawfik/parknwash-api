<?php

namespace App\Containers\AccSupplier\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccCurrency\Models\AccCurrency;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccControlAccount\Models\AccControlAccount;
use App\Containers\User\Models\User;
use App\Containers\AccPurchaseQuote\Models\AccPurchaseQuote;
use App\Containers\AccPurchaseOrder\Models\AccPurchaseOrder;
use App\Containers\AccPurchaseInvoice\Models\AccPurchaseInvoice;
use App\Containers\AccDebitNote\Models\AccDebitNote;
use App\Containers\AccGoodsReceipt\Models\AccGoodsReceipt;


class AccSupplier extends Model
{
    protected $fillable = [
      #Fillables#
		'name',
		 'code',
		 'email',
		 'credit_limit',
		 'currency_id',
		 'address',
		 'division_id',
		 'division_place_id',
		 'place_id',
		 'control_account_id',
		 'available_credit',
		 'status',
		 'account_payable',
		 'money_status',
		 'user_id',
		 'accounts_payable'
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
    protected $resourceKey = 'accsuppliers';
    protected $table = 'acc_supplier';

    public function currency()
    {
        return $this->belongsTo(AccCurrency::class, 'currency_id');
    }

    public function division()
    {
        return $this->belongsTo(AccDivision::class, 'division_id');
    }

    public function place()
    {
        return $this->belongsTo(AccPlace::class, 'place_id');
    }

    public function division_place()
    {
        return $this->belongsTo(AccDivisionPlace::class, 'division_place_id');
    }

    public function control_account()
    {
        return $this->belongsTo(AccControlAccount::class, 'control_account_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function quotes()
    {
        return $this->hasMany(AccPurchaseQuote::class, 'supplier_id');
    }

    public function orders()
    {
        return $this->hasMany(AccPurchaseOrder::class, 'supplier_id');
    }

    public function invoices()
    {
        return $this->hasMany(AccPurchaseInvoice::class, 'supplier_id');
    }

    public function debit_notes()
    {
        return $this->hasMany(AccDebitNote::class, 'supplier_id');
    }

    public function goods_receipts()
    {
        return $this->hasMany(AccGoodsReceipt::class, 'supplier_id');
    }


}

