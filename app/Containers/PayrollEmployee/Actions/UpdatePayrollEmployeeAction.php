<?php

namespace App\Containers\PayrollEmployee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdatePayrollEmployeeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $payrollemployee = Apiato::call('PayrollEmployee@UpdatePayrollEmployeeTask', [$request->id, $data]);

        return $payrollemployee;
    }
}
