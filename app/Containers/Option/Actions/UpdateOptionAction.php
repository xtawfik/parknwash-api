<?php

namespace App\Containers\Option\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateOptionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $option = Apiato::call('Option@UpdateOptionTask', [$request->id, $data]);

        return $option;
    }
}
