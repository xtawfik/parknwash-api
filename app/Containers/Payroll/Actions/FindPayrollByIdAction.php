<?php

namespace App\Containers\Payroll\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindPayrollByIdAction extends Action
{
    public function run(Request $request)
    {
        $payroll = Apiato::call('Payroll@FindPayrollByIdTask', [$request->id]);

        return $payroll;
    }
}
