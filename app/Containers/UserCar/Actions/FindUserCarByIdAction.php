<?php

namespace App\Containers\UserCar\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindUserCarByIdAction extends Action
{
    public function run(Request $request)
    {
        $usercar = Apiato::call('UserCar@FindUserCarByIdTask', [$request->id]);

        return $usercar;
    }
}
