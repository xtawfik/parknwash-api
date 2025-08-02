<?php

namespace App\Containers\AccCustomer\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccDivision\Models\AccDivision;
use App\Containers\AccControlAccount\Models\AccControlAccount;
use App\Containers\AccPlace\Models\AccPlace;
use App\Containers\AccDivisionPlace\Models\AccDivisionPlace;
use App\Containers\AccCurrency\Models\AccCurrency;


class AccCustomer extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'status',
		 'name',
		 'code',
		 'credit_limit',
		 'currency_id',
		 'billing_address',
		 'delivery_address',
		 'email',
		 'division_id',
		 'control_account_id',
		 'available_credit',
		 'total_available_credit',
		 'receipt',
		 'payment',
		 'sales_quote',
		 'sales_order',
		 'sales_invoice',
		 'credit_note',
		 'delivery_note',
		 'quantity_delivery',
		 'quantity_invoice',
		 'univoiced',
		 'account_receivable',
		 'withholding_tax',
		 'money_status',
		 'place_id',
		 'division_place_id',
		 'starting_balance',
		 'autofill_sales_invoice',
		 'autofill_billable_time',
		 'billable_time_hourly_rate',
		 'sales_invoice_due_date'
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
    protected $resourceKey = 'acccustomers';
    protected $table = 'acc_customer';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function division()
    {
        return $this->belongsTo(AccDivision::class, 'division_id');
    }

    public function control_account()
    {
        return $this->belongsTo(AccControlAccount::class, 'control_account_id');
    }

    public function place()
    {
        return $this->belongsTo(AccPlace::class, 'place_id');
    }

    public function division_place()
    {
        return $this->belongsTo(AccDivisionPlace::class, 'division_place_id');
    }

    public function currency()
    {
        return $this->belongsTo(AccCurrency::class, 'currency_id');
    }


}

