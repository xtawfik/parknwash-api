<?php

namespace App\Containers\AccBalanceSheet\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccBalanceSheetAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accbalancesheet = Apiato::call('AccBalanceSheet@UpdateAccBalanceSheetTask', [$request->id, $data]);

        return $accbalancesheet;
    }
}
