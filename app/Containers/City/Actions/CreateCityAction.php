<?php

namespace App\Containers\City\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateCityAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $city = Apiato::call('City@CreateCityTask', [$data]);

        return $city;
    }
}
