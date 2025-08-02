<?php

namespace App\Containers\MallStock\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindMallStockByIdAction extends Action
{
    public function run(Request $request)
    {
        $mallstock = Apiato::call('MallStock@FindMallStockByIdTask', [$request->id]);

        return $mallstock;
    }
}
