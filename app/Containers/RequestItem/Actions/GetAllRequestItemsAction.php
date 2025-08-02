<?php

namespace App\Containers\RequestItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllRequestItemsAction extends Action
{
    public function run(Request $request)
    {
        $requestitems = Apiato::call('RequestItem@GetAllRequestItemsTask', [], ['addRequestCriteria']);

        return $requestitems;
    }
}
