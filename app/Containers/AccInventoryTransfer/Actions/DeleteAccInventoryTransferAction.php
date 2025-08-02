<?php

namespace App\Containers\AccInventoryTransfer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccInventoryTransferAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccInventoryTransfer@DeleteAccInventoryTransferTask', [$request->id]);
    }
}
