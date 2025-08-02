<?php

namespace App\Containers\Supply\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindSupplyByIdAction extends Action
{
    public function run(Request $request)
    {
        $supply = Apiato::call('Supply@FindSupplyByIdTask', [$request->id]);

        return $supply;
    }
}
