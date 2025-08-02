<?php

namespace App\Containers\Target\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteTargetAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Target@DeleteTargetTask', [$request->id]);
    }
}
