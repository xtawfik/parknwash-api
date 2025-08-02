<?php

namespace App\Containers\AccDivision\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccDivisionByIdAction extends Action
{
    public function run(Request $request)
    {
        $accdivision = Apiato::call('AccDivision@FindAccDivisionByIdTask', [$request->id]);

        return $accdivision;
    }
}
