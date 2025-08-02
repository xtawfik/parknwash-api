<?php

namespace App\Containers\AccBalanceSheetAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccBalanceSheetAccountsAction extends Action
{
    public function run(Request $request)
    {
        $accbalancesheetaccounts = Apiato::call('AccBalanceSheetAccount@GetAllAccBalanceSheetAccountsTask', [], ['addRequestCriteria']);

        return $accbalancesheetaccounts;
    }
}
