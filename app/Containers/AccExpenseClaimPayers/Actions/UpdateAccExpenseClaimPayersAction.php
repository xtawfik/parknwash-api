<?php

namespace App\Containers\AccExpenseClaimPayers\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccExpenseClaimPayersAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accexpenseclaimpayers = Apiato::call('AccExpenseClaimPayers@UpdateAccExpenseClaimPayersTask', [$request->id, $data]);

        return $accexpenseclaimpayers;
    }
}
