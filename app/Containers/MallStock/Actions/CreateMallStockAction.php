<?php

namespace App\Containers\MallStock\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateMallStockAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $mallstock = Apiato::call('MallStock@CreateMallStockTask', [$data]);

        return $mallstock;
    }
}
