<?php

namespace App\Containers\ProductOption\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllProductOptionsAction extends Action
{
    public function run(Request $request)
    {
        $productoptions = Apiato::call('ProductOption@GetAllProductOptionsTask', [], ['addRequestCriteria']);

        return $productoptions;
    }
}
