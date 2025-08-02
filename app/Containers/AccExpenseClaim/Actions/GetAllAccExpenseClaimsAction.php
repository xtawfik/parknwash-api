<?php

namespace App\Containers\AccExpenseClaim\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccExpenseClaimsAction extends Action
{
    public function run(Request $request)
    {
        $accexpenseclaims = Apiato::call('AccExpenseClaim@GetAllAccExpenseClaimsTask', [], ['addRequestCriteria']);

        return $accexpenseclaims;
    }
}
