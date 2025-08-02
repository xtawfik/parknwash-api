<?php

namespace App\Containers\AccInventory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccInventoryByIdAction extends Action
{
    public function run(Request $request)
    {
        $accinventory = Apiato::call('AccInventory@FindAccInventoryByIdTask', [$request->id]);

        return $accinventory;
    }
}
