<?php

namespace App\Containers\AccPayslip\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccPayslipAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccPayslip@DeleteAccPayslipTask', [$request->id]);
    }
}
