<?php

namespace App\Containers\AccDivision\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccDivisionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accdivision = Apiato::call('AccDivision@UpdateAccDivisionTask', [$request->id, $data]);

        return $accdivision;
    }
}
