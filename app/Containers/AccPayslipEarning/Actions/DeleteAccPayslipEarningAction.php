<?php

namespace App\Containers\AccPayslipEarning\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccPayslipEarningAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccPayslipEarning@DeleteAccPayslipEarningTask', [$request->id]);
    }
}
