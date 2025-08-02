<?php

namespace App\Containers\StockOut\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateStockOutAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $stockout = Apiato::call('StockOut@CreateStockOutTask', [$data]);

        return $stockout;
    }
}
