<?php

namespace App\Containers\UserCar\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateUserCarAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $usercar = Apiato::call('UserCar@CreateUserCarTask', [$data]);

        return $usercar;
    }
}
