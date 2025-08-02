<?php

namespace App\Containers\AccHistory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccHistoriesAction extends Action
{
    public function run(Request $request)
    {
        $acchistories = Apiato::call('AccHistory@GetAllAccHistoriesTask', [], ['addRequestCriteria']);

        return $acchistories;
    }
}
