<?php

namespace App\Containers\AccBalanceSheet\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccBalanceSheetByIdAction extends Action
{
    public function run(Request $request)
    {
        $accbalancesheet = Apiato::call('AccBalanceSheet@FindAccBalanceSheetByIdTask', [$request->id]);

        return $accbalancesheet;
    }
}
