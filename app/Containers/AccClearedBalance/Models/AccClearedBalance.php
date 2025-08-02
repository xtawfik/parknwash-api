<?php

namespace App\Containers\AccClearedBalance\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccBankAccount\Models\AccBankAccount;


class AccClearedBalance extends Model
{
    protected $fillable = [
      #Fillables#
		'date',
		 'transaction_id',
		 'bank_account_id',
		 'balance'
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
    protected $resourceKey = 'accclearedbalances';
    protected $table = 'acc_cleared_balance';

    public function bank_account()
    {
        return $this->belongsTo(AccBankAccount::class, 'bank_account_id');
    }


}

