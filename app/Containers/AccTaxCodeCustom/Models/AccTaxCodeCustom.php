<?php

namespace App\Containers\AccTaxCodeCustom\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccBalanceSheetAccount\Models\AccBalanceSheetAccount;
use App\Containers\AccTaxCode\Models\AccTaxCode;


class AccTaxCodeCustom extends Model
{
    protected $fillable = [
      #Fillables#
		'name',
		 'rate',
		 'balance_sheet_account_id',
		 'user_id',
		 'tax_code_id'
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
    protected $resourceKey = 'acctaxcodecustoms';
    protected $table = 'acc_tax_code_custom';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function balance_sheet_account()
    {
        return $this->belongsTo(AccBalanceSheetAccount::class, 'balance_sheet_account_id');
    }

    public function tax_code()
    {
        return $this->belongsTo(AccTaxCode::class, 'tax_code_id');
    }


}

