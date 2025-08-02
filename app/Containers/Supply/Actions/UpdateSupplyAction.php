<?php

namespace App\Containers\Supply\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateSupplyAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $supply = Apiato::call('Supply@UpdateSupplyTask', [$request->id, $data]);

        return $supply;
    }
}
