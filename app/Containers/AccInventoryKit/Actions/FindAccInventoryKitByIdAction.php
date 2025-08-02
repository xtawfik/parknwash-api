<?php

namespace App\Containers\AccInventoryKit\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccInventoryKitByIdAction extends Action
{
    public function run(Request $request)
    {
        $accinventorykit = Apiato::call('AccInventoryKit@FindAccInventoryKitByIdTask', [$request->id]);

        return $accinventorykit;
    }
}
