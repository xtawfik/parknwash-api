<?php

namespace App\Containers\VacationType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllVacationTypesAction extends Action
{
    public function run(Request $request)
    {
        $vacationtypes = Apiato::call('VacationType@GetAllVacationTypesTask', [], ['addRequestCriteria']);

        return $vacationtypes;
    }
}
