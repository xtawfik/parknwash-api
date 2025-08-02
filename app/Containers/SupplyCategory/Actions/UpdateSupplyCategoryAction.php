<?php

namespace App\Containers\SupplyCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateSupplyCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $supplycategory = Apiato::call('SupplyCategory@UpdateSupplyCategoryTask', [$request->id, $data]);

        return $supplycategory;
    }
}
