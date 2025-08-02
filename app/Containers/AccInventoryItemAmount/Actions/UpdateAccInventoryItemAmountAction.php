<?php

namespace App\Containers\AccInventoryItemAmount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccInventoryItemAmountAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accinventoryitemamount = Apiato::call('AccInventoryItemAmount@UpdateAccInventoryItemAmountTask', [$request->id, $data]);

        return $accinventoryitemamount;
    }
}
