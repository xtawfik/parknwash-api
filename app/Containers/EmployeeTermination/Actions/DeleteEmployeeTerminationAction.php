<?php

namespace App\Containers\EmployeeTermination\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteEmployeeTerminationAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('EmployeeTermination@DeleteEmployeeTerminationTask', [$request->id]);
    }
}
