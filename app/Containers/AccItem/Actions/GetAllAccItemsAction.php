<?php

namespace App\Containers\AccItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccItemsAction extends Action
{
    public function run(Request $request)
    {
        $accitems = Apiato::call('AccItem@GetAllAccItemsTask', [], ['addRequestCriteria']);

        return $accitems;
    }
}
