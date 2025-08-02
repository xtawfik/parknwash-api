<?php

namespace App\Containers\AccProductionOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccProductionOrderByIdAction extends Action
{
    public function run(Request $request)
    {
        $accproductionorder = Apiato::call('AccProductionOrder@FindAccProductionOrderByIdTask', [$request->id]);

        return $accproductionorder;
    }
}
