<?php

namespace App\Containers\AccExpenseClaim\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccExpenseClaimByIdAction extends Action
{
    public function run(Request $request)
    {
        $accexpenseclaim = Apiato::call('AccExpenseClaim@FindAccExpenseClaimByIdTask', [$request->id]);

        return $accexpenseclaim;
    }
}
