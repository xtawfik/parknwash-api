<?php

namespace App\Containers\Loan\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteLoanAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Loan@DeleteLoanTask', [$request->id]);
    }
}
