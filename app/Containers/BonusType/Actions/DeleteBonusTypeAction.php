<?php

namespace App\Containers\BonusType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteBonusTypeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('BonusType@DeleteBonusTypeTask', [$request->id]);
    }
}
