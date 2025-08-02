<?php

namespace App\Containers\Loan\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateLoanAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $loan = Apiato::call('Loan@UpdateLoanTask', [$request->id, $data]);

        return $loan;
    }
}
