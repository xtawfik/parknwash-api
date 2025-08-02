<?php

namespace App\Containers\Warehouse\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindWarehouseByIdAction extends Action
{
    public function run(Request $request)
    {
        $warehouse = Apiato::call('Warehouse@FindWarehouseByIdTask', [$request->id]);

        return $warehouse;
    }
}
