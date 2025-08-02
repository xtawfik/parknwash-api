<?php

namespace App\Containers\ReasonToLeave\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllReasonToLeavesAction extends Action
{
    public function run(Request $request)
    {
        $reasontoleaves = Apiato::call('ReasonToLeave@GetAllReasonToLeavesTask', [], ['addRequestCriteria']);

        return $reasontoleaves;
    }
}
