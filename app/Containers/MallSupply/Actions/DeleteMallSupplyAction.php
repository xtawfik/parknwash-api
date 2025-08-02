<?php

namespace App\Containers\MallSupply\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteMallSupplyAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('MallSupply@DeleteMallSupplyTask', [$request->id]);
    }
}
