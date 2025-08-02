<?php

namespace App\Containers\Payroll\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdatePayrollAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $payroll = Apiato::call('Payroll@UpdatePayrollTask', [$request->id, $data]);

        return $payroll;
    }
}
