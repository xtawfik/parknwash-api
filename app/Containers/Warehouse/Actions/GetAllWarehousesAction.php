<?php

namespace App\Containers\Warehouse\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllWarehousesAction extends Action
{
    public function run(Request $request)
    {
        $warehouses = Apiato::call('Warehouse@GetAllWarehousesTask', [], ['addRequestCriteria']);

        return $warehouses;
    }
}
