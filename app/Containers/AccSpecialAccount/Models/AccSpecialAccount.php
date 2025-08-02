<?php

namespace App\Containers\AccSpecialAccount\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccControlAccount\Models\AccControlAccount;
use App\Containers\AccBalanceSheet\Models\AccBalanceSheet;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\User\Models\User;
use App\Containers\AccCurrency\Models\AccCurrency;
use App\Containers\AccAccountCategory\Models\AccAccountCategory;


class AccSpecialAccount extends Model
{
    protected $fillable = [
      #Fillables#
		'name',
		 'code',
		 'currency_id',
		 'division_id',
		 'place_id',
		 'division_place_id',
		 'user_id',
		 'balance_sheet_id',
		 'control_account_id',
		 'starting_balance',
		 'balance_type',
		 'status',
		 'balance',
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
    protected $resourceKey = 'accspecialaccounts';
    protected $table = 'acc_special_account';

    public function control_account()
    {
        return $this->belongsTo(AccControlAccount::class, 'control_account_id');
    }

    public function balance_sheet()
    {
        return $this->belongsTo(AccBalanceSheet::class, 'balance_sheet_id');
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function currency()
    {
        return $this->belongsTo(AccCurrency::class, 'currency_id');
    }

    public function account_category()
    {
        return $this->belongsTo(AccAccountCategory::class, 'account_category_id');
    }


}

