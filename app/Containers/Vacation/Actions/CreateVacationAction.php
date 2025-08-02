<?php

namespace App\Containers\Vacation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateVacationAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $vacation = Apiato::call('Vacation@CreateVacationTask', [$data]);

        return $vacation;
    }
}
