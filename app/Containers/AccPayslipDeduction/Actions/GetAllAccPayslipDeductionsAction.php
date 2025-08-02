<?php

namespace App\Containers\AccPayslipDeduction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccPayslipDeductionsAction extends Action
{
    public function run(Request $request)
    {
        $accpayslipdeductions = Apiato::call('AccPayslipDeduction@GetAllAccPayslipDeductionsTask', [], ['addRequestCriteria']);

        return $accpayslipdeductions;
    }
}
