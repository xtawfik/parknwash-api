<?php

namespace App\Containers\Payroll\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeletePayrollAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Payroll@DeletePayrollTask', [$request->id]);
    }
}
