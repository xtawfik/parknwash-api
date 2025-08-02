<?php

namespace App\Containers\AccPayslip\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccPayslipsAction extends Action
{
    public function run(Request $request)
    {
        $accpayslips = Apiato::call('AccPayslip@GetAllAccPayslipsTask', [], ['addRequestCriteria']);

        return $accpayslips;
    }
}
