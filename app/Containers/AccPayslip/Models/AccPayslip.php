<?php

namespace App\Containers\AccPayslip\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\Employee\Models\Employee;
use App\Containers\AccEmployee\Models\AccEmployee;
use App\Containers\AccFooter\Models\AccFooter;
use App\Containers\AccPayslipEarning\Models\AccPayslipEarning;
use App\Containers\AccPayslipDeduction\Models\AccPayslipDeduction;
use App\Containers\AccPayslipContribution\Models\AccPayslipContribution;


class AccPayslip extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'employee_id',
		 'acc_employee_id',
		 'footer_id',
		 'date',
		 'description',
		 'refrence',
		 'show_total',
		 'title',
		 'from_date',
		 'gross_pay',
		 'deduction',
		 'net_pay',
		 'contribution'
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
    protected $resourceKey = 'accpayslips';
    protected $table = 'acc_payslip';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function acc_employee()
    {
        return $this->belongsTo(AccEmployee::class, 'acc_employee_id');
    }

    public function footer()
    {
        return $this->belongsTo(AccFooter::class, 'footer_id');
    }

    public function earnings()
    {
        return $this->hasMany(AccPayslipEarning::class, 'payslip_id');
    }

    public function deductions()
    {
        return $this->hasMany(AccPayslipDeduction::class, 'payslip_id');
    }

    public function contribution()
    {
        return $this->hasMany(AccPayslipContribution::class, 'payslip_id');
    }


}

