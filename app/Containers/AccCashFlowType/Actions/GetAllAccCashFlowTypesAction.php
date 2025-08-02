<?php

namespace App\Containers\AccCashFlowType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccCashFlowTypesAction extends Action
{
    public function run(Request $request)
    {
        $acccashflowtypes = Apiato::call('AccCashFlowType@GetAllAccCashFlowTypesTask', [], ['addRequestCriteria']);

        return $acccashflowtypes;
    }
}
