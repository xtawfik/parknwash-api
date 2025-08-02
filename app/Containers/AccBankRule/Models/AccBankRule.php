<?php

namespace App\Containers\AccBankRule\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccItem\Models\AccItem;
use App\Containers\User\Models\User;
use App\Containers\AccBankAccount\Models\AccBankAccount;
use App\Containers\AccCustomer\Models\AccCustomer;
use App\Containers\AccSupplier\Models\AccSupplier;


class AccBankRule extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'type',
		 'bank_account_id',
		 'amount',
		 'amount_type',
		 'description',
		 'paid_by_type',
		 'other_name',
		 'customer_id',
		 'supplier_id'
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
    protected $resourceKey = 'accbankrules';
    protected $table = 'acc_bank_rule';

    public function items()
    {
        return $this->hasMany(AccItem::class, 'bank_rule_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bank_account()
    {
        return $this->belongsTo(AccBankAccount::class, 'bank_account_id');
    }

    public function customer()
    {
        return $this->belongsTo(AccCustomer::class, 'customer_id');
    }

    public function supplier()
    {
        return $this->belongsTo(AccSupplier::class, 'supplier_id');
    }


}

