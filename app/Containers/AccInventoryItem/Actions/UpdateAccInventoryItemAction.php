<?php

namespace App\Containers\AccInventoryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccInventoryItemAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accinventoryitem = Apiato::call('AccInventoryItem@UpdateAccInventoryItemTask', [$request->id, $data]);

        return $accinventoryitem;
    }
}
