<?php

namespace App\Containers\Loan\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllLoansAction extends Action
{
    public function run(Request $request)
    {
        $loans = Apiato::call('Loan@GetAllLoansTask', [], ['addRequestCriteria']);

        return $loans;
    }
}
