<?php

namespace App\Containers\Loan\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindLoanByIdAction extends Action
{
    public function run(Request $request)
    {
        $loan = Apiato::call('Loan@FindLoanByIdTask', [$request->id]);

        return $loan;
    }
}
