<?php

namespace App\Containers\StockIn\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllStockInsAction extends Action
{
    public function run(Request $request)
    {
        $stockins = Apiato::call('StockIn@GetAllStockInsTask', [], ['addRequestCriteria']);

        return $stockins;
    }
}
