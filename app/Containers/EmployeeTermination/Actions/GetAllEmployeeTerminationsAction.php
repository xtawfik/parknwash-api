<?php

namespace App\Containers\EmployeeTermination\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllEmployeeTerminationsAction extends Action
{
    public function run(Request $request)
    {
        $employeeterminations = Apiato::call('EmployeeTermination@GetAllEmployeeTerminationsTask', [], ['addRequestCriteria']);

        return $employeeterminations;
    }
}
