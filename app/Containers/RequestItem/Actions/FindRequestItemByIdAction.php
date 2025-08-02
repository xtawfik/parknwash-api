<?php

namespace App\Containers\RequestItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindRequestItemByIdAction extends Action
{
    public function run(Request $request)
    {
        $requestitem = Apiato::call('RequestItem@FindRequestItemByIdTask', [$request->id]);

        return $requestitem;
    }
}
