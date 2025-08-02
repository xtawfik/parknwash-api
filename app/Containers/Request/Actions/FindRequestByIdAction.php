<?php

namespace App\Containers\Request\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindRequestByIdAction extends Action
{
    public function run(Request $request)
    {
        $request = Apiato::call('Request@FindRequestByIdTask', [$request->id]);

        return $request;
    }
}
