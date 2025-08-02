<?php

namespace App\Containers\AccExpenseClaim\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccFooter\Models\AccFooter;
use App\Containers\AccCapitalAccount\Models\AccCapitalAccount;
use App\Containers\AccExpenseClaimPayers\Models\AccExpenseClaimPayers;
use App\Containers\AccItem\Models\AccItem;
use App\Containers\AccCurrency\Models\AccCurrency;
use App\Containers\AccInventory\Models\AccInventory;


class AccExpenseClaim extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'date',
		 'reference',
		 'paid_by_id',
		 'capital_account_id',
		 'payee',
		 'currency_id',
		 'description',
		 'amount',
		 'footer_id',
		 'paid_by_type',
		 'inventory_id'
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
    protected $resourceKey = 'accexpenseclaims';
    protected $table = 'acc_expense_claim';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function footer()
    {
        return $this->belongsTo(AccFooter::class, 'footer_id');
    }

    public function capital_account()
    {
        return $this->belongsTo(AccCapitalAccount::class, 'capital_account_id');
    }

    public function paid_by()
    {
        return $this->belongsTo(AccExpenseClaimPayers::class, 'paid_by_id');
    }

    public function items()
    {
        return $this->hasMany(AccItem::class, 'expense_claim_id');
    }

    public function currency()
    {
        return $this->belongsTo(AccCurrency::class, 'currency_id');
    }

    public function inventory()
    {
        return $this->belongsTo(AccInventory::class, 'inventory_id');
    }


}

