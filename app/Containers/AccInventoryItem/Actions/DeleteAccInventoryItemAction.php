<?php

namespace App\Containers\AccInventoryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccInventoryItemAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccInventoryItem@DeleteAccInventoryItemTask', [$request->id]);
    }
}
