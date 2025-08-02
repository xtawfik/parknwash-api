<?php

namespace App\Containers\Warehouse\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateWarehouseAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $warehouse = Apiato::call('Warehouse@CreateWarehouseTask', [$data]);

        return $warehouse;
    }
}
