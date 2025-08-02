<?php

namespace App\Containers\Car\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCarAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Car@DeleteCarTask', [$request->id]);
    }
}
