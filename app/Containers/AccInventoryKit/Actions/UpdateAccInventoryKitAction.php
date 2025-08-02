<?php

namespace App\Containers\AccInventoryKit\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccInventoryKitAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accinventorykit = Apiato::call('AccInventoryKit@UpdateAccInventoryKitTask', [$request->id, $data]);

        return $accinventorykit;
    }
}
