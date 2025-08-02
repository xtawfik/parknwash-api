<?php

namespace App\Containers\Loan\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateLoanAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $loan = Apiato::call('Loan@CreateLoanTask', [$data]);

        return $loan;
    }
}
