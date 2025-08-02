<?php

namespace App\Containers\AccControlAccount\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccBalanceSheet\Models\AccBalanceSheet;
use App\Containers\AccControlType\Models\AccControlType;
use App\Containers\AccSpecialAccount\Models\AccSpecialAccount;
use App\Containers\AccCapitalAccount\Models\AccCapitalAccount;
use App\Containers\AccCapitalSubAccount\Models\AccCapitalSubAccount;
use App\Containers\AccAccountCategory\Models\AccAccountCategory;


class AccControlAccount extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'name',
		 'code',
		 'balance_sheet_id',
		 'control_type_id',
		 'cash_flow_type_id',
		 'cash_flow_id',
		 'status',
		 'account_category_id'
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
    protected $resourceKey = 'acccontrolaccounts';
    protected $table = 'acc_control_account';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function balance_sheet()
    {
        return $this->belongsTo(AccBalanceSheet::class, 'balance_sheet_id');
    }

    public function control_type()
    {
        return $this->belongsTo(AccControlType::class, 'control_type_id');
    }

    public function special_accounts()
    {
        return $this->hasMany(AccSpecialAccount::class, 'control_account_id');
    }

    public function capital_accounts()
    {
        return $this->hasMany(AccCapitalAccount::class, 'control_account_id');
    }

    public function capital_subaccounts()
    {
        return $this->hasMany(AccCapitalSubAccount::class, 'control_account_id');
    }

    public function account_category()
    {
        return $this->belongsTo(AccAccountCategory::class, 'account_category_id');
    }


}

