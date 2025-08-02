<?php

namespace App\Containers\EmployeeDeduction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteEmployeeDeductionAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('EmployeeDeduction@DeleteEmployeeDeductionTask', [$request->id]);
    }
}
