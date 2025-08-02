<?php

namespace App\Containers\Target\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateTargetAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $target = Apiato::call('Target@CreateTargetTask', [$data]);

        return $target;
    }
}
