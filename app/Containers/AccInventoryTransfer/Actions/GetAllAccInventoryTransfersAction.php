<?php

namespace App\Containers\AccInventoryTransfer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccInventoryTransfersAction extends Action
{
    public function run(Request $request)
    {
        $accinventorytransfers = Apiato::call('AccInventoryTransfer@GetAllAccInventoryTransfersTask', [], ['addRequestCriteria']);

        return $accinventorytransfers;
    }
}
