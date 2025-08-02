<?php

namespace App\Containers\AccCurrencyRevaluationaItem\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccCurrencyRevaluation\Models\AccCurrencyRevaluation;
use App\Containers\AccProfitLossAccount\Models\AccProfitLossAccount;
use App\Containers\AccBalanceSheetAccount\Models\AccBalanceSheetAccount;
use App\Containers\AccControlAccount\Models\AccControlAccount;
use App\Containers\AccBankAccount\Models\AccBankAccount;
use App\Containers\AccCustomer\Models\AccCustomer;
use App\Containers\Employee\Models\Employee;
use App\Containers\AccSupplier\Models\AccSupplier;
use App\Containers\AccCapitalAccount\Models\AccCapitalAccount;
use App\Containers\AccSpecialAccount\Models\AccSpecialAccount;


class AccCurrencyRevaluationaItem extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'currency_revaluation_id',
		 'profit_loss_account_id',
		 'balance_sheet_account_id',
		 'gain_loss_value',
		 'control_account_id',
		 'description',
		 'special_account_id',
		 'supplier_id',
		 'customer_id',
		 'employee_id',
		 'bank_account_id',
		 'capital_account_id'
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
    protected $resourceKey = 'acccurrencyrevaluationaitems';
    protected $table = 'acc_currency_revaluationa_item';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function currency_revaluation()
    {
        return $this->belongsTo(AccCurrencyRevaluation::class, 'currency_revaluation_id');
    }

    public function profit_loss_account()
    {
        return $this->belongsTo(AccProfitLossAccount::class, 'profit_loss_account_id');
    }

    public function balance_sheet_account()
    {
        return $this->belongsTo(AccBalanceSheetAccount::class, 'balance_sheet_account_id');
    }

    public function control_account()
    {
        return $this->belongsTo(AccControlAccount::class, 'control_account_id');
    }

    public function bank_account()
    {
        return $this->belongsTo(AccBankAccount::class, 'bank_account_id');
    }

    public function customer()
    {
        return $this->belongsTo(AccCustomer::class, 'customer_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function supplier()
    {
        return $this->belongsTo(AccSupplier::class, 'supplier_id');
    }

    public function capital_account()
    {
        return $this->belongsTo(AccCapitalAccount::class, 'capital_account_id');
    }

    public function special_account()
    {
        return $this->belongsTo(AccSpecialAccount::class, 'special_account_id');
    }


}

