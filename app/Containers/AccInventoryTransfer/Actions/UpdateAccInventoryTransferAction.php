<?php

namespace App\Containers\AccInventoryTransfer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccInventoryTransferAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accinventorytransfer = Apiato::call('AccInventoryTransfer@UpdateAccInventoryTransferTask', [$request->id, $data]);

        return $accinventorytransfer;
    }
}
