<?php

namespace App\Containers\AccNonInventoryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccNonInventoryItemsAction extends Action
{
    public function run(Request $request)
    {
        $accnoninventoryitems = Apiato::call('AccNonInventoryItem@GetAllAccNonInventoryItemsTask', [], ['addRequestCriteria']);

        return $accnoninventoryitems;
    }
}
