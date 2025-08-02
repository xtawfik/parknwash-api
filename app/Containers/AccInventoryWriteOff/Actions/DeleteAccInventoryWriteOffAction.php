<?php

namespace App\Containers\AccInventoryWriteOff\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccInventoryWriteOffAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccInventoryWriteOff@DeleteAccInventoryWriteOffTask', [$request->id]);
    }
}
