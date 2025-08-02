<?php

namespace App\Containers\AccBankAccount\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccReceipt\Models\AccReceipt;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccControlAccount\Models\AccControlAccount;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccCurrency\Models\AccCurrency;
use App\Containers\AccPayment\Models\AccPayment;


class AccBankAccount extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'name',
		 'code',
		 'currency_id',
		 'division_id',
		 'place_id',
		 'division_place_id',
		 'control_account_id',
		 'starting_balance',
		 'iban',
		 'have_pending_transaction',
		 'credit_limit',
		 'status',
		 'uncategorized_receipt',
		 'uncategorized_payment',
		 'cleared_balance',
		 'pending_deposit',
		 'pending_withdrawal',
		 'actual_balance',
		 'last_bank_reconciliation',
		 'available_credit'
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
    protected $resourceKey = 'accbankaccounts';
    protected $table = 'acc_bank_account';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function receipts()
    {
        return $this->hasMany(AccReceipt::class, 'bank_account_id');
    }

    public function division()
    {
        return $this->belongsTo(AccDivision::class, 'division_id');
    }

    public function control_account()
    {
        return $this->belongsTo(AccControlAccount::class, 'control_account_id');
    }

    public function place()
    {
        return $this->belongsTo(AccPlace::class, 'place_id');
    }

    public function division_place()
    {
        return $this->belongsTo(AccDivisionPlace::class, 'division_place_id');
    }

    public function currency()
    {
        return $this->belongsTo(AccCurrency::class, 'currency_id');
    }

    public function payments()
    {
        return $this->hasMany(AccPayment::class, 'bank_account_id');
    }


}

