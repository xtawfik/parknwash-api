<?php

namespace App\Containers\AccPayslipEarning\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccPayslipEarningByIdAction extends Action
{
    public function run(Request $request)
    {
        $accpayslipearning = Apiato::call('AccPayslipEarning@FindAccPayslipEarningByIdTask', [$request->id]);

        return $accpayslipearning;
    }
}
