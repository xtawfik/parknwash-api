<?php

namespace App\Containers\AccHistory\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;


class AccHistory extends Model
{
    protected $fillable = [
      #Fillables#
		'date',
		 'action',
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
    protected $resourceKey = 'acchistories';
    protected $table = 'acc_history';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

