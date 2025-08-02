<?php

namespace App\Containers\CustodyMovement\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateCustodyMovementAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $custodymovement = Apiato::call('CustodyMovement@CreateCustodyMovementTask', [$data]);

        return $custodymovement;
    }
}
