<?php

namespace App\Containers\AccInventoryWriteOff\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccInventoryWriteOffsAction extends Action
{
    public function run(Request $request)
    {
        $accinventorywriteoffs = Apiato::call('AccInventoryWriteOff@GetAllAccInventoryWriteOffsTask', [], ['addRequestCriteria']);

        return $accinventorywriteoffs;
    }
}
