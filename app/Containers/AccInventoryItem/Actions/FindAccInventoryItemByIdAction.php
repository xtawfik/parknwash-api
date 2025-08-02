<?php

namespace App\Containers\AccInventoryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccInventoryItemByIdAction extends Action
{
    public function run(Request $request)
    {
        $accinventoryitem = Apiato::call('AccInventoryItem@FindAccInventoryItemByIdTask', [$request->id]);

        return $accinventoryitem;
    }
}
