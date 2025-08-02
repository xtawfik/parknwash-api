<?php

namespace App\Containers\AccBalanceSheetAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccBalanceSheetAccountByIdAction extends Action
{
    public function run(Request $request)
    {
        $accbalancesheetaccount = Apiato::call('AccBalanceSheetAccount@FindAccBalanceSheetAccountByIdTask', [$request->id]);

        return $accbalancesheetaccount;
    }
}
