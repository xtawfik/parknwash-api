<?php

namespace App\Containers\AccProfitLossAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccProfitLossAccountsAction extends Action
{
    public function run(Request $request)
    {
        $accprofitlossaccounts = Apiato::call('AccProfitLossAccount@GetAllAccProfitLossAccountsTask', [], ['addRequestCriteria']);

        return $accprofitlossaccounts;
    }
}
