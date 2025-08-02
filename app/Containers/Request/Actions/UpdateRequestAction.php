<?php

namespace App\Containers\Request\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateRequestAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $request = Apiato::call('Request@UpdateRequestTask', [$request->id, $data]);

        return $request;
    }
}
