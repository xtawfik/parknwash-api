<?php

namespace App\Containers\Bonus\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateBonusAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $bonus = Apiato::call('Bonus@UpdateBonusTask', [$request->id, $data]);

        return $bonus;
    }
}
