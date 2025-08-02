<?php

namespace App\Containers\AccProductionCost\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccProductionCostByIdAction extends Action
{
    public function run(Request $request)
    {
        $accproductioncost = Apiato::call('AccProductionCost@FindAccProductionCostByIdTask', [$request->id]);

        return $accproductioncost;
    }
}
