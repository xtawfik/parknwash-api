<?php

namespace App\Containers\AccDivision\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccDivisionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accdivision = Apiato::call('AccDivision@CreateAccDivisionTask', [$data]);

        return $accdivision;
    }
}
