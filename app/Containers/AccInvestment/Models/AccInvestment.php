<?php

namespace App\Containers\AccInvestment\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccControlAccount\Models\AccControlAccount;
use App\Containers\AccCurrency\Models\AccCurrency;
use App\Containers\AccInvestmentRevaluation\Models\AccInvestmentRevaluation;


class AccInvestment extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'currency_id',
		 'control_account_id',
		 'code',
		 'name_en',
		 'name_ar',
		 'market_price',
		 'quantity',
		 'total_cost',
		 'status',
		 'average_cost',
		 'market_value',
		 'unrealized_gain'
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
    protected $resourceKey = 'accinvestments';
    protected $table = 'acc_investment';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function control_account()
    {
        return $this->belongsTo(AccControlAccount::class, 'control_account_id');
    }

    public function currency()
    {
        return $this->belongsTo(AccCurrency::class, 'currency_id');
    }

    public function investment_revaluations()
    {
        return $this->belongsToMany(AccInvestmentRevaluation::class, 'investment_id', 'investment_revaluation_id', 'investment_revaluation_item_id');
    }


}

