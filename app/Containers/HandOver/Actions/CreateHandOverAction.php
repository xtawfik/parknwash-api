<?php

namespace App\Containers\HandOver\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateHandOverAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $handover = Apiato::call('HandOver@CreateHandOverTask', [$data]);

        return $handover;
    }
}
