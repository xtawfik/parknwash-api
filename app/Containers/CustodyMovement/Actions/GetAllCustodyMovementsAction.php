<?php

namespace App\Containers\CustodyMovement\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCustodyMovementsAction extends Action
{
    public function run(Request $request)
    {
        $custodymovements = Apiato::call('CustodyMovement@GetAllCustodyMovementsTask', [], ['addRequestCriteria']);

        return $custodymovements;
    }
}
