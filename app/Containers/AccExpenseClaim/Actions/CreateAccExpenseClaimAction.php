<?php

namespace App\Containers\AccExpenseClaim\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccExpenseClaimAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accexpenseclaim = Apiato::call('AccExpenseClaim@CreateAccExpenseClaimTask', [$data]);

        return $accexpenseclaim;
    }
}
