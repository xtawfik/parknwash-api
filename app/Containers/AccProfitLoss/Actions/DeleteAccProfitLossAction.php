<?php

namespace App\Containers\AccProfitLoss\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccProfitLossAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccProfitLoss@DeleteAccProfitLossTask', [$request->id]);
    }
}
