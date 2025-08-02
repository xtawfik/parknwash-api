<?php

namespace App\Containers\AccDivisionPlace\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccDivisionPlaceAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accdivisionplace = Apiato::call('AccDivisionPlace@UpdateAccDivisionPlaceTask', [$request->id, $data]);

        return $accdivisionplace;
    }
}
