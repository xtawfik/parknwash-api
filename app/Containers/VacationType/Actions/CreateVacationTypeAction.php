<?php

namespace App\Containers\VacationType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateVacationTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $vacationtype = Apiato::call('VacationType@CreateVacationTypeTask', [$data]);

        return $vacationtype;
    }
}
