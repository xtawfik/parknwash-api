<?php

namespace App\Containers\StockOut\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindStockOutByIdAction extends Action
{
    public function run(Request $request)
    {
        $stockout = Apiato::call('StockOut@FindStockOutByIdTask', [$request->id]);

        return $stockout;
    }
}
