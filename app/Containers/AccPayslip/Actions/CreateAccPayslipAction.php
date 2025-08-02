<?php

namespace App\Containers\AccPayslip\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccPayslipAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accpayslip = Apiato::call('AccPayslip@CreateAccPayslipTask', [$data]);

        return $accpayslip;
    }
}
