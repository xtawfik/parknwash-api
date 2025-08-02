<?php

namespace App\Containers\Warehouse\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateWarehouseAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $warehouse = Apiato::call('Warehouse@UpdateWarehouseTask', [$request->id, $data]);

        return $warehouse;
    }
}
