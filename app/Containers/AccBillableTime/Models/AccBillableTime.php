<?php

namespace App\Containers\AccBillableTime\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccCustomer\Models\AccCustomer;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccSalesInvoice\Models\AccSalesInvoice;
use App\Containers\User\Models\User;


class AccBillableTime extends Model
{
    protected $fillable = [
      #Fillables#
		'date',
		 'description',
		 'time_spent',
		 'customer_id',
		 'division_id',
		 'place_id',
		 'division_place_id',
		 'sales_invoice_id',
		 'amount',
		 'status',
		 'hourly_rate',
		 'written_off_date',
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
    protected $resourceKey = 'accbillabletimes';
    protected $table = 'acc_billable_time';

    public function customer()
    {
        return $this->belongsTo(AccCustomer::class, 'customer_id');
    }

    public function division()
    {
        return $this->belongsTo(AccDivision::class, 'division_id');
    }

    public function place()
    {
        return $this->belongsTo(AccPlace::class, 'place_id');
    }

    public function division_place()
    {
        return $this->belongsTo(AccDivisionPlace::class, 'division_place_id');
    }

    public function sales_invoice()
    {
        return $this->belongsTo(AccSalesInvoice::class, 'sales_invoice_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

