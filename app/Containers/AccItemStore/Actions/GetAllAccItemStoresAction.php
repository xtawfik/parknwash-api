<?php

namespace App\Containers\AccItemStore\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccItemStoresAction extends Action
{
    public function run(Request $request)
    {
        $accitemstores = Apiato::call('AccItemStore@GetAllAccItemStoresTask', [], ['addRequestCriteria']);

        return $accitemstores;
    }
}
