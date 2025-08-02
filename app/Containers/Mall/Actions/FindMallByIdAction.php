<?php

namespace App\Containers\Mall\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindMallByIdAction extends Action
{
    public function run(Request $request)
    {
        $mall = Apiato::call('Mall@FindMallByIdTask', [$request->id]);

        return $mall;
    }
}
