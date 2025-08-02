<?php

namespace App\Containers\AccAcountTransfer\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccBankAccount\Models\AccBankAccount;
use App\Containers\AccFooter\Models\AccFooter;


class AccAcountTransfer extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'date',
		 'refrence',
		 'description',
		 'paid_from_bank_account_id',
		 'amount',
		 'received_in_bank_account_id',
		 'footer_id',
		 'cleared_type',
		 'cleared_at'
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
    protected $resourceKey = 'accacounttransfers';
    protected $table = 'acc_acount_transfer';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function paid_from_bank_account()
    {
        return $this->belongsTo(AccBankAccount::class, 'paid_from_bank_account_id');
    }

    public function received_in_bank_account()
    {
        return $this->belongsTo(AccBankAccount::class, 'received_in_bank_account_id');
    }

    public function footer()
    {
        return $this->belongsTo(AccFooter::class, 'footer_id');
    }


}

