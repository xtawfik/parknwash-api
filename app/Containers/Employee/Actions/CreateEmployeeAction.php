<?php

namespace App\Containers\Employee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateEmployeeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $employee = Apiato::call('Employee@CreateEmployeeTask', [$data]);

        return $employee;
    }
}
