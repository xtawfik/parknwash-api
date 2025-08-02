<?php

namespace App\Containers\AccCapitalSubAccount\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccControlAccount\Models\AccControlAccount;
use App\Containers\AccBalanceSheet\Models\AccBalanceSheet;
use App\Containers\AccProfitLoss\Models\AccProfitLoss;
use App\Containers\AccCapitalAccount\Models\AccCapitalAccount;
use App\Containers\AccAccountCategory\Models\AccAccountCategory;


class AccCapitalSubAccount extends Model
{
    protected $fillable = [
      #Fillables#
		'name',
		 'user_id',
		 'control_account_id',
		 'balance_sheet_id',
		 'profit_loss_id',
		 'account_category_id',
		 'capital_account_id'
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
    protected $resourceKey = 'acccapitalsubaccounts';
    protected $table = 'acc_capital_sub_account';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function control_account()
    {
        return $this->belongsTo(AccControlAccount::class, 'control_account_id');
    }

    public function balance_sheet()
    {
        return $this->belongsTo(AccBalanceSheet::class, 'balance_sheet_id');
    }

    public function profit_loss()
    {
        return $this->belongsTo(AccProfitLoss::class, 'profit_loss_id');
    }

    public function capital_account()
    {
        return $this->belongsTo(AccCapitalAccount::class, 'capital_account_id');
    }

    public function account_category()
    {
        return $this->belongsTo(AccAccountCategory::class, 'account_category_id');
    }


}

