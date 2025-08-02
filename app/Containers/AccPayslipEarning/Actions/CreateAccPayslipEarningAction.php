<?php

namespace App\Containers\AccPayslipEarning\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccPayslipEarningAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accpayslipearning = Apiato::call('AccPayslipEarning@CreateAccPayslipEarningTask', [$data]);

        return $accpayslipearning;
    }
}
