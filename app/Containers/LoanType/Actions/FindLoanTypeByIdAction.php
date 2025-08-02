<?php

namespace App\Containers\LoanType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindLoanTypeByIdAction extends Action
{
    public function run(Request $request)
    {
        $loantype = Apiato::call('LoanType@FindLoanTypeByIdTask', [$request->id]);

        return $loantype;
    }
}
