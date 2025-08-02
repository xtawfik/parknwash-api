<?php

namespace App\Containers\AccForecast\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccItem\Models\AccItem;
use App\Containers\User\Models\User;


class AccForecast extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'date',
		 'repeat',
		 'description',
		 'amount',
		 'status',
		 'growth'
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
    protected $resourceKey = 'accforecasts';
    protected $table = 'acc_forecast';

    public function items()
    {
        return $this->hasMany(AccItem::class, 'forecast_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

