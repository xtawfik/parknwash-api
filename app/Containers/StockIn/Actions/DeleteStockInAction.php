<?php

namespace App\Containers\StockIn\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteStockInAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('StockIn@DeleteStockInTask', [$request->id]);
    }
}
