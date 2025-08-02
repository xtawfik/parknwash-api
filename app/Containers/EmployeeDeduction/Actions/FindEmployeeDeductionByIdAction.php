<?php

namespace App\Containers\EmployeeDeduction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindEmployeeDeductionByIdAction extends Action
{
    public function run(Request $request)
    {
        $employeededuction = Apiato::call('EmployeeDeduction@FindEmployeeDeductionByIdTask', [$request->id]);

        return $employeededuction;
    }
}
