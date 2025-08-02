<?php

namespace App\Containers\AccProfitLoss\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccProfitLossAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accprofitloss = Apiato::call('AccProfitLoss@UpdateAccProfitLossTask', [$request->id, $data]);

        return $accprofitloss;
    }
}
