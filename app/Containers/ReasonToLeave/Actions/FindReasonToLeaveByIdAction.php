<?php

namespace App\Containers\ReasonToLeave\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindReasonToLeaveByIdAction extends Action
{
    public function run(Request $request)
    {
        $reasontoleave = Apiato::call('ReasonToLeave@FindReasonToLeaveByIdTask', [$request->id]);

        return $reasontoleave;
    }
}
