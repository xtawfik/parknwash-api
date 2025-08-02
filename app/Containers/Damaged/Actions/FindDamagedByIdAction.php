<?php

namespace App\Containers\Damaged\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindDamagedByIdAction extends Action
{
    public function run(Request $request)
    {
        $damaged = Apiato::call('Damaged@FindDamagedByIdTask', [$request->id]);

        return $damaged;
    }
}
