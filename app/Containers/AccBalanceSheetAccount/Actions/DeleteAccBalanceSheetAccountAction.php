<?php

namespace App\Containers\AccBalanceSheetAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccBalanceSheetAccountAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccBalanceSheetAccount@DeleteAccBalanceSheetAccountTask', [$request->id]);
    }
}
