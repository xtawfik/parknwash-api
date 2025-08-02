<?php

namespace App\Containers\AccPayslipDeduction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccPayslipDeductionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accpayslipdeduction = Apiato::call('AccPayslipDeduction@UpdateAccPayslipDeductionTask', [$request->id, $data]);

        return $accpayslipdeduction;
    }
}
