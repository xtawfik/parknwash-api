<?php

namespace App\Containers\ProductOption\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteProductOptionAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('ProductOption@DeleteProductOptionTask', [$request->id]);
    }
}
