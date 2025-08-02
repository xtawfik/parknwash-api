<?php

namespace App\Containers\AccDivision\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccDivisionsAction extends Action
{
    public function run(Request $request)
    {
        $accdivisions = Apiato::call('AccDivision@GetAllAccDivisionsTask', [], ['addRequestCriteria']);

        return $accdivisions;
    }
}
