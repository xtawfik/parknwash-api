<?php

namespace App\Containers\AccExpenseClaimPayers\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccExpenseClaimPayersAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccExpenseClaimPayers@DeleteAccExpenseClaimPayersTask', [$request->id]);
    }
}
