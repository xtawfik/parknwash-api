<?php

namespace App\Containers\AccInventoryItemAmount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccInventoryItemAmountsAction extends Action
{
    public function run(Request $request)
    {
        $accinventoryitemamounts = Apiato::call('AccInventoryItemAmount@GetAllAccInventoryItemAmountsTask', [], ['addRequestCriteria']);

        return $accinventoryitemamounts;
    }
}
