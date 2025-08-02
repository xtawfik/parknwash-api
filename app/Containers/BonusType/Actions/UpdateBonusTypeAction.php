<?php

namespace App\Containers\BonusType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateBonusTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $bonustype = Apiato::call('BonusType@UpdateBonusTypeTask', [$request->id, $data]);

        return $bonustype;
    }
}
