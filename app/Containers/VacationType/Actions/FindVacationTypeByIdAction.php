<?php

namespace App\Containers\VacationType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindVacationTypeByIdAction extends Action
{
    public function run(Request $request)
    {
        $vacationtype = Apiato::call('VacationType@FindVacationTypeByIdTask', [$request->id]);

        return $vacationtype;
    }
}
