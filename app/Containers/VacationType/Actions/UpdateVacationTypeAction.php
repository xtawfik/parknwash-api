<?php

namespace App\Containers\VacationType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateVacationTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $vacationtype = Apiato::call('VacationType@UpdateVacationTypeTask', [$request->id, $data]);

        return $vacationtype;
    }
}
