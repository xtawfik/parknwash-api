<?php

namespace App\Containers\AccBalanceSheet\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccBalanceSheetAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accbalancesheet = Apiato::call('AccBalanceSheet@CreateAccBalanceSheetTask', [$data]);

        return $accbalancesheet;
    }
}
