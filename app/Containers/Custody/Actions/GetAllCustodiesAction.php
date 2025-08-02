<?php

namespace App\Containers\Custody\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCustodiesAction extends Action
{
    public function run(Request $request)
    {
        $custodies = Apiato::call('Custody@GetAllCustodiesTask', [], ['addRequestCriteria']);

        return $custodies;
    }
}
