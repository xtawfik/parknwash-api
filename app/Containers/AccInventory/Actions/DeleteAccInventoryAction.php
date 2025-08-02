<?php

namespace App\Containers\AccInventory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccInventoryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccInventory@DeleteAccInventoryTask', [$request->id]);
    }
}
