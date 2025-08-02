<?php

namespace App\Containers\AccRecurringTransaction\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccItem\Models\AccItem;
use App\Containers\User\Models\User;
use App\Containers\AccFooter\Models\AccFooter;
use App\Containers\AccRecurringCategory\Models\AccRecurringCategory;
use App\Containers\Employee\Models\Employee;
use App\Containers\AccBankAccount\Models\AccBankAccount;
use App\Containers\AccCurrency\Models\AccCurrency;
use App\Containers\AccCustomer\Models\AccCustomer;
use App\Containers\AccSupplier\Models\AccSupplier;
use App\Containers\AccPayslipEarning\Models\AccPayslipEarning;
use App\Containers\AccPayslipDeduction\Models\AccPayslipDeduction;
use App\Containers\AccPayslipContribution\Models\AccPayslipContribution;


class AccRecurringTransaction extends Model
{
    protected $fillable = [
      #Fillables#
		'date',
		 'interval_duration',
		 'interval_type',
		 'description',
		 'total',
		 'show_total',
		 'title',
		 'until_type',
		 'until_date',
		 'amount',
		 'user_id',
		 'footer_id',
		 'category_id',
		 'employee_id',
		 'paid_from_bank_account_id',
		 'received_in_bank_account_id',
		 'currency_id',
		 'customer_id',
		 'supplier_id',
		 'paid_by_type',
		 'other_name',
		 'due_date',
		 'billing_address',
		 'from_date'
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
    protected $resourceKey = 'accrecurringtransactions';
    protected $table = 'acc_recurring_transaction';

    public function items()
    {
        return $this->hasMany(AccItem::class, 'recurring_transaction_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function footer()
    {
        return $this->belongsTo(AccFooter::class, 'footer_id');
    }

    public function category()
    {
        return $this->belongsTo(AccRecurringCategory::class, 'category_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function paid_from_bank_account()
    {
        return $this->belongsTo(AccBankAccount::class, 'paid_from_bank_account_id');
    }

    public function received_in_bank_account()
    {
        return $this->belongsTo(AccBankAccount::class, 'received_in_bank_account_id');
    }

    public function currency()
    {
        return $this->belongsTo(AccCurrency::class, 'currency_id');
    }

    public function customer()
    {
        return $this->belongsTo(AccCustomer::class, 'customer_id');
    }

    public function supplier()
    {
        return $this->belongsTo(AccSupplier::class, 'supplier_id');
    }

    public function earnings()
    {
        return $this->hasMany(AccPayslipEarning::class, 'recurring_transaction_id');
    }

    public function deductions()
    {
        return $this->hasMany(AccPayslipDeduction::class, 'recurring_transaction_id');
    }

    public function contributions()
    {
        return $this->hasMany(AccPayslipContribution::class, 'recurring_transaction_id');
    }


}

