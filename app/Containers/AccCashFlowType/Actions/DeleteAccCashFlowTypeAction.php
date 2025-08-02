<?php

namespace App\Containers\AccCashFlowType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccCashFlowTypeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccCashFlowType@DeleteAccCashFlowTypeTask', [$request->id]);
    }
}
