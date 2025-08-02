<?php

namespace App\Containers\AccProfitLoss\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccProfitLossAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accprofitloss = Apiato::call('AccProfitLoss@CreateAccProfitLossTask', [$data]);

        return $accprofitloss;
    }
}
