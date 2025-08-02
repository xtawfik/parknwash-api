<?php

namespace App\Containers\Warehouse\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteWarehouseAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Warehouse@DeleteWarehouseTask', [$request->id]);
    }
}
