<?php

namespace App\Containers\EmployeeTermination\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateEmployeeTerminationAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $employeetermination = Apiato::call('EmployeeTermination@CreateEmployeeTerminationTask', [$data]);

        return $employeetermination;
    }
}
