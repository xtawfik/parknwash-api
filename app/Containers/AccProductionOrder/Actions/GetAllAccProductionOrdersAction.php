<?php

namespace App\Containers\AccProductionOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccProductionOrdersAction extends Action
{
    public function run(Request $request)
    {
        $accproductionorders = Apiato::call('AccProductionOrder@GetAllAccProductionOrdersTask', [], ['addRequestCriteria']);

        return $accproductionorders;
    }
}
