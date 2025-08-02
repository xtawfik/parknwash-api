<?php

namespace App\Containers\DamageRequest\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllDamageRequestsAction extends Action
{
    public function run(Request $request)
    {
        $damagerequests = Apiato::call('DamageRequest@GetAllDamageRequestsTask', [], ['addRequestCriteria']);

        return $damagerequests;
    }
}
