<?php

namespace App\Containers\MallStock\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateMallStockAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $mallstock = Apiato::call('MallStock@UpdateMallStockTask', [$request->id, $data]);

        return $mallstock;
    }
}
