<?php

namespace App\Containers\AccInventoryTransfer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccInventoryTransferByIdAction extends Action
{
    public function run(Request $request)
    {
        $accinventorytransfer = Apiato::call('AccInventoryTransfer@FindAccInventoryTransferByIdTask', [$request->id]);

        return $accinventorytransfer;
    }
}
