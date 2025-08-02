<?php

namespace App\Containers\AccDivision\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccDivisionAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccDivision@DeleteAccDivisionTask', [$request->id]);
    }
}
