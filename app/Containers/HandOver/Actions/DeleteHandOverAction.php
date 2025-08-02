<?php

namespace App\Containers\HandOver\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteHandOverAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('HandOver@DeleteHandOverTask', [$request->id]);
    }
}
