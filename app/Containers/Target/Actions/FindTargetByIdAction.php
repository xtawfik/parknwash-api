<?php

namespace App\Containers\Target\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindTargetByIdAction extends Action
{
    public function run(Request $request)
    {
        $target = Apiato::call('Target@FindTargetByIdTask', [$request->id]);

        return $target;
    }
}
