<?php

namespace App\Containers\AccNonInventoryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccNonInventoryItemAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accnoninventoryitem = Apiato::call('AccNonInventoryItem@UpdateAccNonInventoryItemTask', [$request->id, $data]);

        return $accnoninventoryitem;
    }
}
