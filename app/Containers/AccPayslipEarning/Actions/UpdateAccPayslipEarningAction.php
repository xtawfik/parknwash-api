<?php

namespace App\Containers\AccPayslipEarning\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccPayslipEarningAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accpayslipearning = Apiato::call('AccPayslipEarning@UpdateAccPayslipEarningTask', [$request->id, $data]);

        return $accpayslipearning;
    }
}
