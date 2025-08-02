<?php

namespace App\Containers\EmployeeDeductionType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllEmployeeDeductionTypesAction extends Action
{
    public function run(Request $request)
    {
        $employeedeductiontypes = Apiato::call('EmployeeDeductionType@GetAllEmployeeDeductionTypesTask', [], ['addRequestCriteria']);

        return $employeedeductiontypes;
    }
}
