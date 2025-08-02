<?php

namespace App\Containers\EmployeeTermination\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateEmployeeTerminationAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $employeetermination = Apiato::call('EmployeeTermination@UpdateEmployeeTerminationTask', [$request->id, $data]);

        return $employeetermination;
    }
}
