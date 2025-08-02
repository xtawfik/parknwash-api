<?php

namespace App\Containers\AccProfitLoss\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccProfitLossesAction extends Action
{
    public function run(Request $request)
    {
        $accprofitlosses = Apiato::call('AccProfitLoss@GetAllAccProfitLossesTask', [], ['addRequestCriteria']);

        return $accprofitlosses;
    }
}
