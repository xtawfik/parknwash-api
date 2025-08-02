<?php

namespace App\Containers\StockOut\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteStockOutAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('StockOut@DeleteStockOutTask', [$request->id]);
    }
}
