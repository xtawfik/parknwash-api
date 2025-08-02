<?php

namespace App\Containers\City\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateCityAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $city = Apiato::call('City@UpdateCityTask', [$request->id, $data]);

        return $city;
    }
}
