<?php

namespace App\Containers\SupplyCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllSupplyCategoriesAction extends Action
{
    public function run(Request $request)
    {
        $supplycategories = Apiato::call('SupplyCategory@GetAllSupplyCategoriesTask', [], ['addRequestCriteria']);

        return $supplycategories;
    }
}
