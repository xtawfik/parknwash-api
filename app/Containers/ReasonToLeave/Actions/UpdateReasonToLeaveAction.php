<?php

namespace App\Containers\ReasonToLeave\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateReasonToLeaveAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $reasontoleave = Apiato::call('ReasonToLeave@UpdateReasonToLeaveTask', [$request->id, $data]);

        return $reasontoleave;
    }
}
