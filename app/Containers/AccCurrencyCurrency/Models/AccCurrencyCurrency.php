<?php

namespace App\Containers\AccCurrencyCurrency\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccCurrencyRevaluation\Models\AccCurrencyRevaluation;
use App\Containers\AccCurrency\Models\AccCurrency;
use App\Containers\User\Models\User;


class AccCurrencyCurrency extends Model
{
    protected $fillable = [
      #Fillables#
		'currency_id',
		 'currency_revaluation_id',
		 'realized_gain',
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
    protected $resourceKey = 'acccurrencycurrencies';
    protected $table = 'acc_currency_currency';

    public function currency_revaluation()
    {
        return $this->belongsTo(AccCurrencyRevaluation::class, 'currency_revaluation_id');
    }

    public function currency()
    {
        return $this->belongsTo(AccCurrency::class, 'currency_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

