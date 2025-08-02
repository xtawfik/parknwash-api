<?php

namespace App\Containers\AccInventory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccInventoriesAction extends Action
{
    public function run(Request $request)
    {
        $accinventories = Apiato::call('AccInventory@GetAllAccInventoriesTask', [], ['addRequestCriteria']);

        return $accinventories;
    }
}
