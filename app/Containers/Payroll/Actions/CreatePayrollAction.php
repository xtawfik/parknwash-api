<?php

namespace App\Containers\Payroll\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreatePayrollAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $payroll = Apiato::call('Payroll@CreatePayrollTask', [$data]);

        return $payroll;
    }
}
