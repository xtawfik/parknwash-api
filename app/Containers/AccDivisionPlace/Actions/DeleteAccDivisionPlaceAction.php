<?php

namespace App\Containers\AccDivisionPlace\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccDivisionPlaceAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccDivisionPlace@DeleteAccDivisionPlaceTask', [$request->id]);
    }
}
