<?php

namespace App\Containers\Option\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateOptionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $option = Apiato::call('Option@CreateOptionTask', [$data]);

        return $option;
    }
}
