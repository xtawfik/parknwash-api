<?php

namespace App\Containers\AccExpenseClaimPayers\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccExpenseClaimPayersAction extends Action
{
    public function run(Request $request)
    {
        $accexpenseclaimpayers = Apiato::call('AccExpenseClaimPayers@GetAllAccExpenseClaimPayersTask', [], ['addRequestCriteria']);

        return $accexpenseclaimpayers;
    }
}
