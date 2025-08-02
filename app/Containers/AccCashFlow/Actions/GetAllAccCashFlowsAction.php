<?php

namespace App\Containers\AccCashFlow\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccCashFlowsAction extends Action
{
    public function run(Request $request)
    {
        $acccashflows = Apiato::call('AccCashFlow@GetAllAccCashFlowsTask', [], ['addRequestCriteria']);

        return $acccashflows;
    }
}
