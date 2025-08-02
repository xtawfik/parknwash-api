<?php

namespace App\Containers\EmployeeDeduction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllEmployeeDeductionsAction extends Action
{
    public function run(Request $request)
    {
        $employeedeductions = Apiato::call('EmployeeDeduction@GetAllEmployeeDeductionsTask', [], ['addRequestCriteria']);

        return $employeedeductions;
    }
}
