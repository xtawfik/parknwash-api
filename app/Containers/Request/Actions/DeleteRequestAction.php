<?php

namespace App\Containers\Request\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteRequestAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Request@DeleteRequestTask', [$request->id]);
    }
}
