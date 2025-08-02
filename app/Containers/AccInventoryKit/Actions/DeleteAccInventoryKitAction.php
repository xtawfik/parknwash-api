<?php

namespace App\Containers\AccInventoryKit\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccInventoryKitAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccInventoryKit@DeleteAccInventoryKitTask', [$request->id]);
    }
}
