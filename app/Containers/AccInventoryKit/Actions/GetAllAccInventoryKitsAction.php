<?php

namespace App\Containers\AccInventoryKit\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccInventoryKitsAction extends Action
{
    public function run(Request $request)
    {
        $accinventorykits = Apiato::call('AccInventoryKit@GetAllAccInventoryKitsTask', [], ['addRequestCriteria']);

        return $accinventorykits;
    }
}
