<?php

namespace App\Containers\AccTaxCode\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\AccTaxCodeCustom\Models\AccTaxCodeCustom;
use App\Containers\AccBalanceSheetAccount\Models\AccBalanceSheetAccount;
use App\Containers\AccReportingCategory\Models\AccReportingCategory;


class AccTaxCode extends Model
{
    protected $fillable = [
      #Fillables#
		'name',
		 'code',
		 'user_id',
		 'label',
		 'tax_rate',
		 'invoice_title',
		 'credit_note_title',
		 'balance_sheet_account_id',
		 'custome_type',
		 'rate',
		 'reverse_charged',
		 'status',
		 'net_reporting_category_id',
		 'net_reporting_category_reversed_id',
		 'amount_reporting_category_reversed_id',
		 'amount_reporting_category_id'
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
    protected $resourceKey = 'acctaxcodes';
    protected $table = 'acc_tax_code';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function customs()
    {
        return $this->hasMany(AccTaxCodeCustom::class, 'tax_code_id');
    }

    public function balance_sheet_account()
    {
        return $this->belongsTo(AccBalanceSheetAccount::class, 'balance_sheet_account_id');
    }

    public function net_reporting_category()
    {
        return $this->belongsTo(AccReportingCategory::class, 'net_reporting_category_id');
    }

    public function net_reporting_category_reversed()
    {
        return $this->belongsTo(AccReportingCategory::class, 'net_reporting_category_reversed_id');
    }

    public function amount_reporting_category_reversed()
    {
        return $this->belongsTo(AccReportingCategory::class, 'amount_reporting_category_reversed_id');
    }

    public function amount_reporting_category()
    {
        return $this->belongsTo(AccReportingCategory::class, 'amount_reporting_category_id');
    }


}

