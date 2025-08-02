<?php

namespace App\Containers\CustodyMovement\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCustodyMovementAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('CustodyMovement@DeleteCustodyMovementTask', [$request->id]);
    }
}
