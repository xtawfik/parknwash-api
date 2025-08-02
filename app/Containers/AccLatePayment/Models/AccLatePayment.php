<?php

namespace App\Containers\AccLatePayment\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccSalesInvoice\Models\AccSalesInvoice;
use App\Containers\User\Models\User;
use App\Containers\AccCustomer\Models\AccCustomer;


class AccLatePayment extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'date',
		 'customer_id',
		 'sales_invoice_id',
		 'amount'
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
    protected $resourceKey = 'acclatepayments';
    protected $table = 'acc_late_payment';

    public function sales_invoice()
    {
        return $this->belongsTo(AccSalesInvoice::class, 'sales_invoice_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function customer()
    {
        return $this->belongsTo(AccCustomer::class, 'customer_id');
    }


}

