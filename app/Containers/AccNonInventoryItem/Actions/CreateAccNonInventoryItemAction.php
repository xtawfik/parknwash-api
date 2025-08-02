<?php

namespace App\Containers\AccNonInventoryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccNonInventoryItemAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accnoninventoryitem = Apiato::call('AccNonInventoryItem@CreateAccNonInventoryItemTask', [$data]);

        return $accnoninventoryitem;
    }
}
