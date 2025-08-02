<?php

namespace App\Containers\AccExpenseClaim\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccExpenseClaimAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccExpenseClaim@DeleteAccExpenseClaimTask', [$request->id]);
    }
}
