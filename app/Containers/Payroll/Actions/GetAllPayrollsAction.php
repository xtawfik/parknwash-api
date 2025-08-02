<?php

namespace App\Containers\Payroll\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllPayrollsAction extends Action
{
    public function run(Request $request)
    {
        $payrolls = Apiato::call('Payroll@GetAllPayrollsTask', [], ['addRequestCriteria']);

        return $payrolls;
    }
}
