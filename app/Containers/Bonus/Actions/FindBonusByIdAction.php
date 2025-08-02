<?php

namespace App\Containers\Bonus\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindBonusByIdAction extends Action
{
    public function run(Request $request)
    {
        $bonus = Apiato::call('Bonus@FindBonusByIdTask', [$request->id]);

        return $bonus;
    }
}
