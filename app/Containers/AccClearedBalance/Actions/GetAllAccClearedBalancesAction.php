<?php

namespace App\Containers\AccClearedBalance\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccClearedBalancesAction extends Action
{
    public function run(Request $request)
    {
        $accclearedbalances = Apiato::call('AccClearedBalance@GetAllAccClearedBalancesTask', [], ['addRequestCriteria']);

        return $accclearedbalances;
    }
}
