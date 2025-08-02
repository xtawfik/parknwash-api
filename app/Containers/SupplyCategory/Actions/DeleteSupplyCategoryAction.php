<?php

namespace App\Containers\SupplyCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteSupplyCategoryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('SupplyCategory@DeleteSupplyCategoryTask', [$request->id]);
    }
}
