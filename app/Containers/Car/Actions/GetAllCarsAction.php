<?php

namespace App\Containers\Car\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCarsAction extends Action
{
    public function run(Request $request)
    {
        $cars = Apiato::call('Car@GetAllCarsTask', [], ['addRequestCriteria']);

        return $cars;
    }
}
