<?php

namespace App\Containers\AccPayslipEarning\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccPayslipEarningsAction extends Action
{
    public function run(Request $request)
    {
        $accpayslipearnings = Apiato::call('AccPayslipEarning@GetAllAccPayslipEarningsTask', [], ['addRequestCriteria']);

        return $accpayslipearnings;
    }
}
