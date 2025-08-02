<?php

namespace App\Containers\AccDivisionPlace\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccDivisionPlaceAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accdivisionplace = Apiato::call('AccDivisionPlace@CreateAccDivisionPlaceTask', [$data]);

        return $accdivisionplace;
    }
}
