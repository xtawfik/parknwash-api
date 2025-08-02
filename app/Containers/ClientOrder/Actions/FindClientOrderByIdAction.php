<?php

namespace App\Containers\ClientOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindClientOrderByIdAction extends Action
{
    public function run(Request $request)
    {
        $clientorder = Apiato::call('ClientOrder@FindClientOrderByIdTask', [$request->id]);

        return $clientorder;
    }
}
