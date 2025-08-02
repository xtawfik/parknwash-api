<?php

namespace App\Containers\Stock\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateStockAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $stock = Apiato::call('Stock@CreateStockTask', [$data]);

        return $stock;
    }
}
