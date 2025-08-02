<?php

namespace App\Containers\EmployeeDeduction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateEmployeeDeductionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $employeededuction = Apiato::call('EmployeeDeduction@UpdateEmployeeDeductionTask', [$request->id, $data]);

        return $employeededuction;
    }
}
