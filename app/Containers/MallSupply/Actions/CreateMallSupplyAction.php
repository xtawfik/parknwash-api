<?php

namespace App\Containers\MallSupply\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateMallSupplyAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $mallsupply = Apiato::call('MallSupply@CreateMallSupplyTask', [$data]);

        return $mallsupply;
    }
}
