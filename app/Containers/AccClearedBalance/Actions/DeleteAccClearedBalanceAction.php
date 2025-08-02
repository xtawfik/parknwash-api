<?php

namespace App\Containers\AccClearedBalance\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccClearedBalanceAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccClearedBalance@DeleteAccClearedBalanceTask', [$request->id]);
    }
}
