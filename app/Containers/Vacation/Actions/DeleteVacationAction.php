<?php

namespace App\Containers\Vacation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteVacationAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Vacation@DeleteVacationTask', [$request->id]);
    }
}
