<?php

namespace App\Containers\AccCurrencyRevaluation\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccCurrencyRevaluationaItem\Models\AccCurrencyRevaluationaItem;
use App\Containers\AccCurrencyCurrency\Models\AccCurrencyCurrency;
use App\Containers\User\Models\User;


class AccCurrencyRevaluation extends Model
{
    protected $fillable = [
      #Fillables#
		'date',
		 'total_item',
		 'total_gain',
		 'unrealized_gain',
		 'description',
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
    protected $resourceKey = 'acccurrencyrevaluations';
    protected $table = 'acc_currency_revaluation';

    public function items()
    {
        return $this->hasMany(AccCurrencyRevaluationaItem::class, 'currency_revaluation_id');
    }

    public function currencies()
    {
        return $this->hasMany(AccCurrencyCurrency::class, 'currency_revaluation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

