<?php

namespace App\Containers\AccLockDate\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccLockDateAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acclockdate = Apiato::call('AccLockDate@CreateAccLockDateTask', [$data]);

        return $acclockdate;
    }
}
