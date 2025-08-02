<?php

namespace App\Containers\DamageRequest\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteDamageRequestAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('DamageRequest@DeleteDamageRequestTask', [$request->id]);
    }
}
