<?php

namespace App\Containers\AccLockDate\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccLockDateAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccLockDate@DeleteAccLockDateTask', [$request->id]);
    }
}
