<?php

namespace App\Containers\AccCurrencyExchangeTransaction\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccCurrencyExchange\Models\AccCurrencyExchange;
use App\Containers\User\Models\User;


class AccCurrencyExchangeTransaction extends Model
{
    protected $fillable = [
      #Fillables#
		'date',
		 'base_amount',
		 'exchange_amount',
		 'currency_exchange_id',
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
    protected $resourceKey = 'acccurrencyexchangetransactions';
    protected $table = 'acc_currency_exchange_transaction';

    public function currency_exchange()
    {
        return $this->belongsTo(AccCurrencyExchange::class, 'currency_exchange_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

