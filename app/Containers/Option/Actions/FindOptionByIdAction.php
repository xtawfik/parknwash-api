<?php

namespace App\Containers\Option\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindOptionByIdAction extends Action
{
    public function run(Request $request)
    {
        $option = Apiato::call('Option@FindOptionByIdTask', [$request->id]);

        return $option;
    }
}
