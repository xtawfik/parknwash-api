<?php

namespace App\Containers\AccInventoryWriteOff\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccInventoryWriteOffAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accinventorywriteoff = Apiato::call('AccInventoryWriteOff@UpdateAccInventoryWriteOffTask', [$request->id, $data]);

        return $accinventorywriteoff;
    }
}
