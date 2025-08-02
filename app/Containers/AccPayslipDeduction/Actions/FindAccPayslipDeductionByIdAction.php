<?php

namespace App\Containers\AccPayslipDeduction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccPayslipDeductionByIdAction extends Action
{
    public function run(Request $request)
    {
        $accpayslipdeduction = Apiato::call('AccPayslipDeduction@FindAccPayslipDeductionByIdTask', [$request->id]);

        return $accpayslipdeduction;
    }
}
