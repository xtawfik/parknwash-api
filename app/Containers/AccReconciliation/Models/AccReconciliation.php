<?php

namespace App\Containers\AccReconciliation\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccBankAccount\Models\AccBankAccount;
use App\Containers\User\Models\User;


class AccReconciliation extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'date',
		 'bank_account_id',
		 'statement_balance',
		 'status',
		 'discrepancy'
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
    protected $resourceKey = 'accreconciliations';
    protected $table = 'acc_reconciliation';

    public function bank_account()
    {
        return $this->belongsTo(AccBankAccount::class, 'bank_account_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

