<?php

namespace App\Containers\CustodyMovement\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCustodyMovementByIdAction extends Action
{
    public function run(Request $request)
    {
        $custodymovement = Apiato::call('CustodyMovement@FindCustodyMovementByIdTask', [$request->id]);

        return $custodymovement;
    }
}
