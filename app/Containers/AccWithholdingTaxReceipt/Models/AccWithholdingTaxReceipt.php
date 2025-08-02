<?php

namespace App\Containers\AccWithholdingTaxReceipt\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccCustomer\Models\AccCustomer;


class AccWithholdingTaxReceipt extends Model
{
    protected $fillable = [
      #Fillables#
		'date',
		 'user_id',
		 'customer_id',
		 'description',
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
    protected $resourceKey = 'accwithholdingtaxreceipts';
    protected $table = 'acc_withholding_tax_receipt';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function customer()
    {
        return $this->belongsTo(AccCustomer::class, 'customer_id');
    }


}

