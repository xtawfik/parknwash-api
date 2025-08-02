<?php

namespace App\Containers\MallSupply\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateMallSupplyAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $mallsupply = Apiato::call('MallSupply@UpdateMallSupplyTask', [$request->id, $data]);

        return $mallsupply;
    }
}
