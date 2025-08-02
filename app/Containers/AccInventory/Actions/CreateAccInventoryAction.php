<?php

namespace App\Containers\AccInventory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccInventoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accinventory = Apiato::call('AccInventory@CreateAccInventoryTask', [$data]);

        return $accinventory;
    }
}
