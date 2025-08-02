<?php

namespace App\Containers\AccProject\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;


class AccProject extends Model
{
    protected $fillable = [
      #Fillables#
		'name',
		 'income',
		 'direct_cost',
		 'profit',
		 'status',
		 'user_id',
		 'code'
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
    protected $resourceKey = 'accprojects';
    protected $table = 'acc_project';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

