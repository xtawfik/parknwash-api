<?php

namespace App\Containers\City\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCityByIdAction extends Action
{
    public function run(Request $request)
    {
        $city = Apiato::call('City@FindCityByIdTask', [$request->id]);

        return $city;
    }
}
