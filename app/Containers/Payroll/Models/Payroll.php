<?php

namespace App\Containers\Payroll\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Account\Models\Account;


class Payroll extends Model
{
    protected $fillable = [
      #Fillables#
		'country_id',
		 'mall_id',
		 'account_id',
		 'month',
		 'year',
		 'employee_number',
		 'total',
		 'payment_date',
		 'description_en',
		 'description_ar'
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
    protected $resourceKey = 'payrolls';
    protected $table = 'payroll';

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }


}

