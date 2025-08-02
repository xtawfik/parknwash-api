<?php

namespace App\Containers\StockIn\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateStockInAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $stockin = Apiato::call('StockIn@UpdateStockInTask', [$request->id, $data]);

        return $stockin;
    }
}
