<?php

namespace App\Containers\DamageRequest\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindDamageRequestByIdAction extends Action
{
    public function run(Request $request)
    {
        $damagerequest = Apiato::call('DamageRequest@FindDamageRequestByIdTask', [$request->id]);

        return $damagerequest;
    }
}
