<?php

namespace App\Containers\AccBankStatement\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccBankAccount\Models\AccBankAccount;


class AccBankStatement extends Model
{
    protected $fillable = [
      #Fillables#
		'bank_account_id',
		 'user_id'
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
    protected $resourceKey = 'accbankstatements';
    protected $table = 'acc_bank_statement';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bank_account()
    {
        return $this->belongsTo(AccBankAccount::class, 'bank_account_id');
    }


}

