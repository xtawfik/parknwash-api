<?php

namespace App\Containers\AccExpenseClaimPayers\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccExpenseClaimPayersByIdAction extends Action
{
    public function run(Request $request)
    {
        $accexpenseclaimpayers = Apiato::call('AccExpenseClaimPayers@FindAccExpenseClaimPayersByIdTask', [$request->id]);

        return $accexpenseclaimpayers;
    }
}
