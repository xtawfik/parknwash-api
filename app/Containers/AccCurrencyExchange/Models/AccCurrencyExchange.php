<?php

namespace App\Containers\AccCurrencyExchange\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccCurrency\Models\AccCurrency;
use App\Containers\AccCurrencyExchangeTransaction\Models\AccCurrencyExchangeTransaction;


class AccCurrencyExchange extends Model
{
    protected $fillable = [
      #Fillables#
		'date',
		 'currency_id',
		 'rate',
		 'transaction',
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
    protected $resourceKey = 'acccurrencyexchanges';
    protected $table = 'acc_currency_exchange';

    public function currency()
    {
        return $this->belongsTo(AccCurrency::class, 'currency_id');
    }

    public function transactions()
    {
        return $this->hasMany(AccCurrencyExchangeTransaction::class, 'currency_exchange_id');
    }


}

