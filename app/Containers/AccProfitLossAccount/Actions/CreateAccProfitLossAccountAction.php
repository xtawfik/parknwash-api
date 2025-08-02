<?php

namespace App\Containers\AccProfitLossAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccProfitLossAccountAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accprofitlossaccount = Apiato::call('AccProfitLossAccount@CreateAccProfitLossAccountTask', [$data]);

        return $accprofitlossaccount;
    }
}
