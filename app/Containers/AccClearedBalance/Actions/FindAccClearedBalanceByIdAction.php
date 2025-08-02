<?php

namespace App\Containers\AccClearedBalance\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccClearedBalanceByIdAction extends Action
{
    public function run(Request $request)
    {
        $accclearedbalance = Apiato::call('AccClearedBalance@FindAccClearedBalanceByIdTask', [$request->id]);

        return $accclearedbalance;
    }
}
