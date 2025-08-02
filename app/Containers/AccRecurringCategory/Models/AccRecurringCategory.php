<?php

namespace App\Containers\AccRecurringCategory\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;


class AccRecurringCategory extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar',
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
    protected $resourceKey = 'accrecurringcategories';
    protected $table = 'acc_recurring_category';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

