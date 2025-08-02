<?php

namespace App\Containers\AccProductionOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccProductionOrderAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccProductionOrder@DeleteAccProductionOrderTask', [$request->id]);
    }
}
