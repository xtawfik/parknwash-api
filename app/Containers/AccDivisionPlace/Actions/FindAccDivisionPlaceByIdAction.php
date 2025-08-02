<?php

namespace App\Containers\AccDivisionPlace\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccDivisionPlaceByIdAction extends Action
{
    public function run(Request $request)
    {
        $accdivisionplace = Apiato::call('AccDivisionPlace@FindAccDivisionPlaceByIdTask', [$request->id]);

        return $accdivisionplace;
    }
}
