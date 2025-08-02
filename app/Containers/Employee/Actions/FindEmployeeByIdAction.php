<?php

namespace App\Containers\Employee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindEmployeeByIdAction extends Action
{
    public function run(Request $request)
    {
        $employee = Apiato::call('Employee@FindEmployeeByIdTask', [$request->id]);

        return $employee;
    }
}
