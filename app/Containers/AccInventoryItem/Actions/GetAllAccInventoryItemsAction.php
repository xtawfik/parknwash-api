<?php

namespace App\Containers\AccInventoryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccInventoryItemsAction extends Action
{
    public function run(Request $request)
    {
        $accinventoryitems = Apiato::call('AccInventoryItem@GetAllAccInventoryItemsTask', [], ['addRequestCriteria']);

        return $accinventoryitems;
    }
}
