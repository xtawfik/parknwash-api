<?php

namespace App\Containers\LoanType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllLoanTypesAction extends Action
{
    public function run(Request $request)
    {
        $loantypes = Apiato::call('LoanType@GetAllLoanTypesTask', [], ['addRequestCriteria']);

        return $loantypes;
    }
}
