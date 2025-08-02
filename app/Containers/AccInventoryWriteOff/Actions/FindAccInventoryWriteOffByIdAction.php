<?php

namespace App\Containers\AccInventoryWriteOff\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccInventoryWriteOffByIdAction extends Action
{
    public function run(Request $request)
    {
        $accinventorywriteoff = Apiato::call('AccInventoryWriteOff@FindAccInventoryWriteOffByIdTask', [$request->id]);

        return $accinventorywriteoff;
    }
}
