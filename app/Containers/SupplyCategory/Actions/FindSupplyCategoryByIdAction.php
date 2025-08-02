<?php

namespace App\Containers\SupplyCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindSupplyCategoryByIdAction extends Action
{
    public function run(Request $request)
    {
        $supplycategory = Apiato::call('SupplyCategory@FindSupplyCategoryByIdTask', [$request->id]);

        return $supplycategory;
    }
}
