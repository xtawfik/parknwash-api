<?php

namespace App\Containers\StockIn\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindStockInByIdAction extends Action
{
    public function run(Request $request)
    {
        $stockin = Apiato::call('StockIn@FindStockInByIdTask', [$request->id]);

        return $stockin;
    }
}
