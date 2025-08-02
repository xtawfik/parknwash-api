<?php

namespace App\Containers\MallSupply\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindMallSupplyByIdAction extends Action
{
    public function run(Request $request)
    {
        $mallsupply = Apiato::call('MallSupply@FindMallSupplyByIdTask', [$request->id]);

        return $mallsupply;
    }
}
