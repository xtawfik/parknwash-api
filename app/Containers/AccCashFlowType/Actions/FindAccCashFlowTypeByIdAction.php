<?php

namespace App\Containers\AccCashFlowType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccCashFlowTypeByIdAction extends Action
{
    public function run(Request $request)
    {
        $acccashflowtype = Apiato::call('AccCashFlowType@FindAccCashFlowTypeByIdTask', [$request->id]);

        return $acccashflowtype;
    }
}
