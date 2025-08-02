<?php

namespace App\Containers\AccCashFlowType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccCashFlowTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccashflowtype = Apiato::call('AccCashFlowType@UpdateAccCashFlowTypeTask', [$request->id, $data]);

        return $acccashflowtype;
    }
}
