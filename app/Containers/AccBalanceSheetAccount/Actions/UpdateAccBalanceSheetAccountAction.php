<?php

namespace App\Containers\AccBalanceSheetAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccBalanceSheetAccountAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accbalancesheetaccount = Apiato::call('AccBalanceSheetAccount@UpdateAccBalanceSheetAccountTask', [$request->id, $data]);

        return $accbalancesheetaccount;
    }
}
