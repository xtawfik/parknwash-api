<?php

namespace App\Containers\Option\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteOptionAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Option@DeleteOptionTask', [$request->id]);
    }
}
