<?php

namespace App\Containers\AccProfitLossAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccProfitLossAccountByIdAction extends Action
{
    public function run(Request $request)
    {
        $accprofitlossaccount = Apiato::call('AccProfitLossAccount@FindAccProfitLossAccountByIdTask', [$request->id]);

        return $accprofitlossaccount;
    }
}
