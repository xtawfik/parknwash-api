<?php

namespace App\Containers\StockIn\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateStockInAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $stockin = Apiato::call('StockIn@CreateStockInTask', [$data]);

        return $stockin;
    }
}
