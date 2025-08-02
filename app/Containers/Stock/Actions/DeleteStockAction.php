<?php

namespace App\Containers\Stock\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteStockAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Stock@DeleteStockTask', [$request->id]);
    }
}
