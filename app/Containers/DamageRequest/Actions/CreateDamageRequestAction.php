<?php

namespace App\Containers\DamageRequest\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateDamageRequestAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $damagerequest = Apiato::call('DamageRequest@CreateDamageRequestTask', [$data]);

        return $damagerequest;
    }
}
