<?php

namespace App\Containers\CarCountry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateCarCountryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $carcountry = Apiato::call('CarCountry@CreateCarModelTask', [$data]);

        return $carcountry;
    }
}
