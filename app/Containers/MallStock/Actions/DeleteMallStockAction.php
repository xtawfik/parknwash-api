<?php

namespace App\Containers\MallStock\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteMallStockAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('MallStock@DeleteMallStockTask', [$request->id]);
    }
}
