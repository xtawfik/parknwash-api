<?php

namespace App\Containers\RequestItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateRequestItemAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $requestitem = Apiato::call('RequestItem@CreateRequestItemTask', [$data]);

        return $requestitem;
    }
}
