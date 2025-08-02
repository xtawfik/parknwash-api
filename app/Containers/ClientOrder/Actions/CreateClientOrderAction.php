<?php

namespace App\Containers\ClientOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateClientOrderAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $clientorder = Apiato::call('ClientOrder@CreateClientOrderTask', [$data]);

        return $clientorder;
    }
}
