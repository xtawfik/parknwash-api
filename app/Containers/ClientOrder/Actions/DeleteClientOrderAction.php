<?php

namespace App\Containers\ClientOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteClientOrderAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('ClientOrder@DeleteClientOrderTask', [$request->id]);
    }
}
