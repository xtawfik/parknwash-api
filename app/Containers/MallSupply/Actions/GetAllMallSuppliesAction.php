<?php

namespace App\Containers\MallSupply\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllMallSuppliesAction extends Action
{
    public function run(Request $request)
    {
        $mallsupplies = Apiato::call('MallSupply@GetAllMallSuppliesTask', [], ['addRequestCriteria']);

        return $mallsupplies;
    }
}
