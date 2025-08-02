<?php

namespace App\Containers\PayrollEmployee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindPayrollEmployeeByIdAction extends Action
{
    public function run(Request $request)
    {
        $payrollemployee = Apiato::call('PayrollEmployee@FindPayrollEmployeeByIdTask', [$request->id]);

        return $payrollemployee;
    }
}
