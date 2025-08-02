<?php

namespace App\Containers\AccProductionCost\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccProductionCostAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccProductionCost@DeleteAccProductionCostTask', [$request->id]);
    }
}
