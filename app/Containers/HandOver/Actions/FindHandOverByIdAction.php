<?php

namespace App\Containers\HandOver\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindHandOverByIdAction extends Action
{
    public function run(Request $request)
    {
        $handover = Apiato::call('HandOver@FindHandOverByIdTask', [$request->id]);

        return $handover;
    }
}
