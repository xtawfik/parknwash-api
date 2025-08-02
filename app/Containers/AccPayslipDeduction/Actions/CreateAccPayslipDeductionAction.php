<?php

namespace App\Containers\AccPayslipDeduction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccPayslipDeductionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accpayslipdeduction = Apiato::call('AccPayslipDeduction@CreateAccPayslipDeductionTask', [$data]);

        return $accpayslipdeduction;
    }
}
