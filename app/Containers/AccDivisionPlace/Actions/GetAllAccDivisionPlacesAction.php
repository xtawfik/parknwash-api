<?php

namespace App\Containers\AccDivisionPlace\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccDivisionPlacesAction extends Action
{
    public function run(Request $request)
    {
        $accdivisionplaces = Apiato::call('AccDivisionPlace@GetAllAccDivisionPlacesTask', [], ['addRequestCriteria']);

        return $accdivisionplaces;
    }
}
