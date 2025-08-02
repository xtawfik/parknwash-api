<?php

namespace App\Containers\AccPayslip\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccPayslipByIdAction extends Action
{
    public function run(Request $request)
    {
        $accpayslip = Apiato::call('AccPayslip@FindAccPayslipByIdTask', [$request->id]);

        return $accpayslip;
    }
}
