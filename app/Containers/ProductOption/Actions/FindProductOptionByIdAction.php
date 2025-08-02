<?php

namespace App\Containers\ProductOption\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindProductOptionByIdAction extends Action
{
    public function run(Request $request)
    {
        $productoption = Apiato::call('ProductOption@FindProductOptionByIdTask', [$request->id]);

        return $productoption;
    }
}
