<?php

namespace App\Containers\Stock\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindStockByIdAction extends Action
{
    public function run(Request $request)
    {
        $stock = Apiato::call('Stock@FindStockByIdTask', [$request->id]);

        return $stock;
    }
}
