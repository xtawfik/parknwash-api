<?php

namespace App\Containers\ProductOption\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateProductOptionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $productoption = Apiato::call('ProductOption@UpdateProductOptionTask', [$request->id, $data]);

        return $productoption;
    }
}
