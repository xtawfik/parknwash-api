<?php

namespace App\Containers\EmployeeTermination\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindEmployeeTerminationByIdAction extends Action
{
    public function run(Request $request)
    {
        $employeetermination = Apiato::call('EmployeeTermination@FindEmployeeTerminationByIdTask', [$request->id]);

        return $employeetermination;
    }
}
