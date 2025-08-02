<?php

namespace App\Containers\LoanType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateLoanTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $loantype = Apiato::call('LoanType@UpdateLoanTypeTask', [$request->id, $data]);

        return $loantype;
    }
}
