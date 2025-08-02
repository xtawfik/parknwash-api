<?php

namespace App\Containers\AccBalanceSheet\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccBalanceSheetAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccBalanceSheet@DeleteAccBalanceSheetTask', [$request->id]);
    }
}
