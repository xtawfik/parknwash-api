<?php

namespace App\Containers\AccProductionCost\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccProductionCostsAction extends Action
{
    public function run(Request $request)
    {
        $accproductioncosts = Apiato::call('AccProductionCost@GetAllAccProductionCostsTask', [], ['addRequestCriteria']);

        return $accproductioncosts;
    }
}
