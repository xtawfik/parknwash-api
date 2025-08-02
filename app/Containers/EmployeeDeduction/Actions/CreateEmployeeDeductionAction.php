<?php

namespace App\Containers\EmployeeDeduction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateEmployeeDeductionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $employeededuction = Apiato::call('EmployeeDeduction@CreateEmployeeDeductionTask', [$data]);

        return $employeededuction;
    }
}
