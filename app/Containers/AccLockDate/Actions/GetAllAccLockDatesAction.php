<?php

namespace App\Containers\AccLockDate\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccLockDatesAction extends Action
{
    public function run(Request $request)
    {
        $acclockdates = Apiato::call('AccLockDate@GetAllAccLockDatesTask', [], ['addRequestCriteria']);

        return $acclockdates;
    }
}
