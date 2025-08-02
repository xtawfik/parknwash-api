<?php

namespace App\Containers\AccBalanceSheet\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccBalanceSheet\Models\AccBalanceSheet;
use App\Containers\User\Models\User;
use App\Containers\AccBalanceSheetAccount\Models\AccBalanceSheetAccount;
use App\Containers\AccControlAccount\Models\AccControlAccount;
use App\Containers\AccCapitalSubAccount\Models\AccCapitalSubAccount;
use App\Containers\AccCapitalAccount\Models\AccCapitalAccount;


class AccBalanceSheet extends Model
{
    protected $fillable = [
      #Fillables#
		'name',
		 'parent_id',
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
    protected $resourceKey = 'accbalancesheets';
    protected $table = 'acc_balance_sheet';

    public function parent()
    {
        return $this->belongsTo(AccBalanceSheet::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function balance_sheet_accounts()
    {
        return $this->hasMany(AccBalanceSheetAccount::class, 'balance_sheet_id');
    }

    public function control_accounts()
    {
        return $this->hasMany(AccControlAccount::class, 'balance_sheet_id');
    }

    public function subaccounts()
    {
        return $this->hasMany(AccCapitalSubAccount::class, 'balance_sheet_id');
    }

    public function capital_accounts()
    {
        return $this->hasMany(AccCapitalAccount::class, 'balance_sheet_id');
    }


}

