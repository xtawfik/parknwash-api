<?php

namespace App\Containers\StockOut\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllStockOutsAction extends Action
{
    public function run(Request $request)
    {
        $stockouts = Apiato::call('StockOut@GetAllStockOutsTask', [], ['addRequestCriteria']);

        return $stockouts;
    }
}
