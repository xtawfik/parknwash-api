<?php

namespace App\Containers\AccCapitalAccount\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccBalanceSheet\Models\AccBalanceSheet;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccControlAccount\Models\AccControlAccount;
use App\Containers\AccAccountCategory\Models\AccAccountCategory;


class AccCapitalAccount extends Model
{
    protected $fillable = [
      #Fillables#
		'name',
		 'code',
		 'control_account_id',
		 'division_id',
		 'division_place_id',
		 'place_id',
		 'starting_balance_type',
		 'starting_balance_amount',
		 'status',
		 'user_id',
		 'balance_sheet_id',
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
    protected $resourceKey = 'acccapitalaccounts';
    protected $table = 'acc_capital_account';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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

    public function control_account()
    {
        return $this->belongsTo(AccControlAccount::class, 'control_account_id');
    }

    public function account_category()
    {
        return $this->belongsTo(AccAccountCategory::class, 'account_category_id');
    }


}

