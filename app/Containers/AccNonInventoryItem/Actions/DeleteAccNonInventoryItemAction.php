<?php

namespace App\Containers\AccNonInventoryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccNonInventoryItemAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccNonInventoryItem@DeleteAccNonInventoryItemTask', [$request->id]);
    }
}
