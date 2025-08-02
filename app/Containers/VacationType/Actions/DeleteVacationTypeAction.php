<?php

namespace App\Containers\VacationType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteVacationTypeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('VacationType@DeleteVacationTypeTask', [$request->id]);
    }
}
