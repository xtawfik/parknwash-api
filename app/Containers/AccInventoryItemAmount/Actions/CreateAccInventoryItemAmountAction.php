<?php

namespace App\Containers\AccInventoryItemAmount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccInventoryItemAmountAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accinventoryitemamount = Apiato::call('AccInventoryItemAmount@CreateAccInventoryItemAmountTask', [$data]);

        return $accinventoryitemamount;
    }
}
