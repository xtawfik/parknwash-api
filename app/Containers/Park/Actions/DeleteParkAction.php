<?php

namespace App\Containers\Park\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteParkAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Park@DeleteParkTask', [$request->id]);
    }
}
