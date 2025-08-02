<?php

namespace App\Containers\AccProductionOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccProductionOrderAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accproductionorder = Apiato::call('AccProductionOrder@CreateAccProductionOrderTask', [$data]);

        return $accproductionorder;
    }
}
