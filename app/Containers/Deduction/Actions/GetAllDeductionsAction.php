<?php

namespace App\Containers\Deduction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllDeductionsAction extends Action
{
    public function run(Request $request)
    {
        $deductions = Apiato::call('Deduction@GetAllDeductionsTask', [], ['addRequestCriteria']);

        return $deductions;
    }
}
