<?php

namespace App\Containers\Bonus\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllBonusesAction extends Action
{
    public function run(Request $request)
    {
        $bonuses = Apiato::call('Bonus@GetAllBonusesTask', [], ['addRequestCriteria']);

        return $bonuses;
    }
}
