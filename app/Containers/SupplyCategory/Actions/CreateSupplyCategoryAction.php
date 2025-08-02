<?php

namespace App\Containers\SupplyCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateSupplyCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $supplycategory = Apiato::call('SupplyCategory@CreateSupplyCategoryTask', [$data]);

        return $supplycategory;
    }
}
