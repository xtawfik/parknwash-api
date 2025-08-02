<?php

namespace App\Containers\EmployeeDeductionType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteEmployeeDeductionTypeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('EmployeeDeductionType@DeleteEmployeeDeductionTypeTask', [$request->id]);
    }
}
