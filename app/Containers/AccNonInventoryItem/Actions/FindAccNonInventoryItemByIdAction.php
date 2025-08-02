<?php

namespace App\Containers\AccNonInventoryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccNonInventoryItemByIdAction extends Action
{
    public function run(Request $request)
    {
        $accnoninventoryitem = Apiato::call('AccNonInventoryItem@FindAccNonInventoryItemByIdTask', [$request->id]);

        return $accnoninventoryitem;
    }
}
