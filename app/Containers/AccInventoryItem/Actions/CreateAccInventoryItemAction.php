<?php

namespace App\Containers\AccInventoryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccInventoryItemAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accinventoryitem = Apiato::call('AccInventoryItem@CreateAccInventoryItemTask', [$data]);

        return $accinventoryitem;
    }
}
