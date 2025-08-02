<?php

namespace App\Containers\Stock\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateStockAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $stock = Apiato::call('Stock@UpdateStockTask', [$request->id, $data]);

        return $stock;
    }
}
