<?php

namespace App\Containers\BonusType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllBonusTypesAction extends Action
{
    public function run(Request $request)
    {
        $bonustypes = Apiato::call('BonusType@GetAllBonusTypesTask', [], ['addRequestCriteria']);

        return $bonustypes;
    }
}
