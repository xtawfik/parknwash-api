<?php

namespace App\Containers\AccLockDate\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccLockDateByIdAction extends Action
{
    public function run(Request $request)
    {
        $acclockdate = Apiato::call('AccLockDate@FindAccLockDateByIdTask', [$request->id]);

        return $acclockdate;
    }
}
