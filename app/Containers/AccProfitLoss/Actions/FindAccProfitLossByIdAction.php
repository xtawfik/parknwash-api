<?php

namespace App\Containers\AccProfitLoss\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccProfitLossByIdAction extends Action
{
    public function run(Request $request)
    {
        $accprofitloss = Apiato::call('AccProfitLoss@FindAccProfitLossByIdTask', [$request->id]);

        return $accprofitloss;
    }
}
