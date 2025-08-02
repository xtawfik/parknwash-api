<?php

namespace App\Containers\AccPlace\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccPlaceAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccPlace@DeleteAccPlaceTask', [$request->id]);
    }
}
