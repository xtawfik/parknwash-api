<?php

namespace App\Containers\Damaged\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllDamagedsAction extends Action
{
    public function run(Request $request)
    {
        $damageds = Apiato::call('Damaged@GetAllDamagedsTask', [], ['addRequestCriteria']);

        return $damageds;
    }
}
