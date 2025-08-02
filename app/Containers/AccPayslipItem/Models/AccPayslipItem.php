<?php

namespace App\Containers\AccPayslipItem\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccReportingCategory\Models\AccReportingCategory;
use App\Containers\AccProfitLossAccount\Models\AccProfitLossAccount;
use App\Containers\AccBalanceSheetAccount\Models\AccBalanceSheetAccount;
use App\Containers\AccPayslipItemCategory\Models\AccPayslipItemCategory;


class AccPayslipItem extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar',
		 'status',
		 'user_id',
		 'category_id',
		 'balance_sheet_acount_id',
		 'profit_loss_account_id',
		 'reporting_category_id'
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
    protected $resourceKey = 'accpayslipitems';
    protected $table = 'acc_payslip_item';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reporting_category()
    {
        return $this->belongsTo(AccReportingCategory::class, 'reporting_category_id');
    }

    public function profit_loss_account()
    {
        return $this->belongsTo(AccProfitLossAccount::class, 'profit_loss_account_id');
    }

    public function balance_sheet_account()
    {
        return $this->belongsTo(AccBalanceSheetAccount::class, 'balance_sheet_account_id');
    }

    public function category()
    {
        return $this->belongsTo(AccPayslipItemCategory::class, 'category_id');
    }


}

