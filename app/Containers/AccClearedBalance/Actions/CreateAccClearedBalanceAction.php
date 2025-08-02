<?php

namespace App\Containers\AccClearedBalance\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccClearedBalanceAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accclearedbalance = Apiato::call('AccClearedBalance@CreateAccClearedBalanceTask', [$data]);

        return $accclearedbalance;
    }
}
