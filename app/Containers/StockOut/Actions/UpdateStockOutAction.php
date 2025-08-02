<?php

namespace App\Containers\StockOut\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateStockOutAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $stockout = Apiato::call('StockOut@UpdateStockOutTask', [$request->id, $data]);

        return $stockout;
    }
}
