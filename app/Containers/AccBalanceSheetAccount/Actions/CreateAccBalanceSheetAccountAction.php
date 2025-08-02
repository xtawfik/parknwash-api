<?php

namespace App\Containers\AccBalanceSheetAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccBalanceSheetAccountAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accbalancesheetaccount = Apiato::call('AccBalanceSheetAccount@CreateAccBalanceSheetAccountTask', [$data]);

        return $accbalancesheetaccount;
    }
}
