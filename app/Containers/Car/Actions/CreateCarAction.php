<?php

namespace App\Containers\Car\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateCarAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $car = Apiato::call('Car@CreateCarTask', [$data]);

        return $car;
    }
}
