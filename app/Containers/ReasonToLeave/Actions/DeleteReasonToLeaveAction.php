<?php

namespace App\Containers\ReasonToLeave\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteReasonToLeaveAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('ReasonToLeave@DeleteReasonToLeaveTask', [$request->id]);
    }
}
