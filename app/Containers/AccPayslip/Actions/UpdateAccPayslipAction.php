<?php

namespace App\Containers\AccPayslip\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccPayslipAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accpayslip = Apiato::call('AccPayslip@UpdateAccPayslipTask', [$request->id, $data]);

        return $accpayslip;
    }
}
