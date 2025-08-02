<?php

namespace App\Containers\PayrollEmployee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeletePayrollEmployeeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('PayrollEmployee@DeletePayrollEmployeeTask', [$request->id]);
    }
}
