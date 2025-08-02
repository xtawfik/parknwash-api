<?php

namespace App\Containers\BonusType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindBonusTypeByIdAction extends Action
{
    public function run(Request $request)
    {
        $bonustype = Apiato::call('BonusType@FindBonusTypeByIdTask', [$request->id]);

        return $bonustype;
    }
}
