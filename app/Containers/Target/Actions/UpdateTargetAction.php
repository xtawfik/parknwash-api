<?php

namespace App\Containers\Target\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateTargetAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $target = Apiato::call('Target@UpdateTargetTask', [$request->id, $data]);

        return $target;
    }
}
