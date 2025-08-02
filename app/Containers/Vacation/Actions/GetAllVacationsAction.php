<?php

namespace App\Containers\Vacation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllVacationsAction extends Action
{
    public function run(Request $request)
    {
        $vacations = Apiato::call('Vacation@GetAllVacationsTask', [], ['addRequestCriteria']);

        return $vacations;
    }
}
