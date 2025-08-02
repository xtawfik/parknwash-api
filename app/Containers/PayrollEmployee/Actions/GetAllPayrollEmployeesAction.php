<?php

namespace App\Containers\PayrollEmployee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllPayrollEmployeesAction extends Action
{
    public function run(Request $request)
    {
        $payrollemployees = Apiato::call('PayrollEmployee@GetAllPayrollEmployeesTask', [], ['addRequestCriteria']);

        return $payrollemployees;
    }
}
