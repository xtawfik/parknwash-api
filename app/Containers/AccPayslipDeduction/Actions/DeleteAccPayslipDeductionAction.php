<?php

namespace App\Containers\AccPayslipDeduction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccPayslipDeductionAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccPayslipDeduction@DeleteAccPayslipDeductionTask', [$request->id]);
    }
}
