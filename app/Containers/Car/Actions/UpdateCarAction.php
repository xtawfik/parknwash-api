<?php

namespace App\Containers\Car\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateCarAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $car = Apiato::call('Car@UpdateCarTask', [$request->id, $data]);

        return $car;
    }
}
