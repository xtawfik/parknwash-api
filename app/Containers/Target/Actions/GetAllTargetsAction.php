<?php

namespace App\Containers\Target\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllTargetsAction extends Action
{
    public function run(Request $request)
    {
        $targets = Apiato::call('Target@GetAllTargetsTask', [], ['addRequestCriteria']);

        return $targets;
    }
}
