<?php

namespace App\Containers\Supply\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllSuppliesAction extends Action
{
    public function run(Request $request)
    {
        $supplies = Apiato::call('Supply@GetAllSuppliesTask', [], ['addRequestCriteria']);

        return $supplies;
    }
}
