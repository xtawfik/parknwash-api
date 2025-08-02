<?php

namespace App\Containers\CustodyMovement\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateCustodyMovementAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $custodymovement = Apiato::call('CustodyMovement@UpdateCustodyMovementTask', [$request->id, $data]);

        return $custodymovement;
    }
}
