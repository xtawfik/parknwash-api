<?php

namespace App\Containers\Vacation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindVacationByIdAction extends Action
{
    public function run(Request $request)
    {
        $vacation = Apiato::call('Vacation@FindVacationByIdTask', [$request->id]);

        return $vacation;
    }
}
