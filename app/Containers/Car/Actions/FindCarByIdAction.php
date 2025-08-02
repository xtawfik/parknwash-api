<?php

namespace App\Containers\Car\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCarByIdAction extends Action
{
    public function run(Request $request)
    {
        $car = Apiato::call('Car@FindCarByIdTask', [$request->id]);

        return $car;
    }
}
