<?php

namespace App\Containers\AccExpenseClaim\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccExpenseClaimAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accexpenseclaim = Apiato::call('AccExpenseClaim@UpdateAccExpenseClaimTask', [$request->id, $data]);

        return $accexpenseclaim;
    }
}
