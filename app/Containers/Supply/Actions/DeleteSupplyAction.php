<?php

namespace App\Containers\Supply\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteSupplyAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Supply@DeleteSupplyTask', [$request->id]);
    }
}
