<?php

namespace App\Containers\UserCar\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllUserCarsAction extends Action
{
    public function run(Request $request)
    {
        $usercars = Apiato::call('UserCar@GetAllUserCarsTask', [], ['addRequestCriteria']);

        return $usercars;
    }
}
