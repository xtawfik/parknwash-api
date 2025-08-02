<?php

namespace App\Containers\AccInventoryItemAmount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccInventoryItemAmountByIdAction extends Action
{
    public function run(Request $request)
    {
        $accinventoryitemamount = Apiato::call('AccInventoryItemAmount@FindAccInventoryItemAmountByIdTask', [$request->id]);

        return $accinventoryitemamount;
    }
}
