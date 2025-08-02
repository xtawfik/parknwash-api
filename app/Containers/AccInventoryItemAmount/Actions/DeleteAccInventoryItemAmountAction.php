<?php

namespace App\Containers\AccInventoryItemAmount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccInventoryItemAmountAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccInventoryItemAmount@DeleteAccInventoryItemAmountTask', [$request->id]);
    }
}
