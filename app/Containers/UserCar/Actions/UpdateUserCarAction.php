<?php

namespace App\Containers\UserCar\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateUserCarAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $usercar = Apiato::call('UserCar@UpdateUserCarTask', [$request->id, $data]);

        return $usercar;
    }
}
