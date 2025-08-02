<?php

namespace App\Containers\AccProductionCost\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccProductionCostAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accproductioncost = Apiato::call('AccProductionCost@UpdateAccProductionCostTask', [$request->id, $data]);

        return $accproductioncost;
    }
}
