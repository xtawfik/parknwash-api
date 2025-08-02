<?php

namespace App\Containers\Employee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllEmployeesAction extends Action
{
    public function run(Request $request)
    {
        $employees = Apiato::call('Employee@GetAllEmployeesTask', [], ['addRequestCriteria']);

        return $employees;
    }
}
