<?php

namespace App\Containers\Stock\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllStocksAction extends Action
{
    public function run(Request $request)
    {
        $stocks = Apiato::call('Stock@GetAllStocksTask', [], ['addRequestCriteria']);

        return $stocks;
    }
}
