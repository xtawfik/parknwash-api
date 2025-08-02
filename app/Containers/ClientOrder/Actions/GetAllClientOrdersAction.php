<?php

namespace App\Containers\ClientOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllClientOrdersAction extends Action
{
    public function run(Request $request)
    {
        $clientorders = Apiato::call('ClientOrder@GetAllClientOrdersTask', [], ['addRequestCriteria']);

        return $clientorders;
    }
}
